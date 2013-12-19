<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail','Network/Email');

class UsersController extends AppController {
    public $helpers = array('Html', 'Form');
	public $components = array(
		'Auth' => array(
			'authError' => 'ログインしてください。'));
	public $uses = array('Post', 'User', 'Signature');
	
	public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->authError = "ログインしてください。";
    $this->set('Auth_user', $this->Auth->user(''));
    //$this->Auth->allow('add'); // ユーザーに自身で登録させる
	}
	
	public function index() {
		$this->layout = null;
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }
	
	public function login() {
		$this->layout = null;
	    if ($this->request->is('post')) {
        	if ($this->Auth->login()){
        		$this->Session->write("Auth_user",$this->Auth->user());
		        $this->Post->recursive = 2;
		        $this->Post->Contact->unbindModel(array(
				    'belongsTo' => array('Post')));
        		$post = $this->Post->find('all', array(
        										'conditions' => array("OR" => array(
        														'Post.user_id' => $this->Auth->user('id'),
        														'Post.contacter_id' => $this->Auth->user('id')
        														))
        										)     	
        		);
        		// $this->log($post,'log');
        		$this->Session->write("user_log", $post);
               	return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
	        } else {
	            $this->Session->setFlash('学内アドレスとパスワードが一致しません！', 'default', array(), 'auth');
        	}
    	}
	}
	
	public function logout() {
	    $this->redirect($this->Auth->logout());
	}
	
	public function signature(){
		$code = $this->params['url']['code'];

		$sig_data = $this->Signature->find('first', array('conditions' => array('Signature.code' => $code)));
		$sig_data = $this->Signature->find('first', array(
			'conditions' => array('Signature.code' => $code),
	        'fields' => array('Signature.id', 'Signature.username', 'Signature.password', 'Signature.created')
	    ));
		
		$id = $this->User->find('first', array('fields' => 'MAX(User.id)'));
		$id = intval($id['0']['MAX(`User`.`id`)']) + 1;
		
		$data = array('User' => array('id' => $id ,
									  'username' => $sig_data['Signature']['username'],
									  'password' => $sig_data['Signature']['password'],
									  'address' => $sig_data['Signature']['username'].'@s.iwate-pu.ac.jp',
									  'created' => $sig_data['Signature']['created']));
		
		$fields = array('id', 'username', 'password', 'address', 'created');
		$this->User->save($data, false, $fields);

		//$this->log($data, 'log');
		$this->Signature->id = $sig_data['Signature']['id'];
		$this->Signature->delete();
		$this->redirect(array('controller' => 'users', 'action' => 'login'));

	    
  //       if($sig_data){
  //       	$this->User->create();
  //       	$this->Uesr->set(array('username' => $sig_data['Signature']['username'],
  //       						   'password' => $sig_data['Signature']['password'],
  //       						   'created' => $sig_data['Signature']['created']));
		//    	$this->User->save() 
  //       	$this->redirect(array('controller' => 'users', 'action' => 'login'));
        	
  //       }else if(!$sig_data){
  //       	$this->Session->setFlash('本登録ができませんでした。仮登録を完了していないか、URLの期限切れです。', 'default', array(), 'auth');
  //       }
  
	}

	public function add() {	//新規登録メソッド
		$this->layout = null;
		if (!empty($this->data)) {							//リクエストメソッドがpostだったら以下を実行
            //if ($this->data) {								//リクエストデータを保存できたら以下を実行	
                //$address = $this->data["Signature"]["username"]."@s.iwate-pu.ac.jp";
                $this->Signature->create();
				$signature = $this->_signature();
				$this->Signature->save($this->data);

				$id = $this->Signature->getLastInsertID();
				$data = array('Signature' => array('id' => $id, 'code' => $signature));	//更新する内容（データ指定）
				$fields = array('code');												//更新する項目（フィールド指定）
				$this->Signature->save($data, false, $fields);							//更新

				$this->_sendmail($this->Signature->getLastInsertID(), $signature);		//メール送信
				
                $this->redirect(array('controller' => 'users', 'action' => 'login'));	//リダイレクト先のURLを指定
            //} 
        }
	}

	function setting(){
		$this->set('Auth_user', $this->Auth->user());

		if(!empty($this->data)){
			$this->User->findById($this->Auth->user('id'));

			$data = array('User' => array('id' => $this->Auth->user('id') ,
									  'driverflag' => 1,
									  'gender' => $this->data['User']['gender'],
									  'grade' => $this->data['User']['grade'],
									  'faculty' => $this->data['User']['faculty'],
									  'hobby' => $this->data['User']['hobby'],
									  'club' => $this->data['User']['club'],
									  'subculture' => $this->data['User']['subculture'],
									  'capacity' => $this->data['User']['capacity'],
									  'comment' => $this->data['User']['comment']));
		
			$fields = array('id', 'driverflag', 'gender', 'grade', 'faculty', 'hobby', 'club', 'subculture', 'capacity', 'comment');
			$this->User->save($data, false, $fields);
		}
	}

	function _sendmail($id = null, $signature){
		$data = $this->Signature->findById($id);
		
		$address = $this->data["Signature"]["username"]."@s.iwate-pu.ac.jp";
		//$this->log($signature, 'log');
		
		$email = new CakeEmail('gmail');
		$body = array('msg' => $signature);
		// 送信！
		$mailRespons = $email->emailformat('text')
			->template('entry_mail','text_layout')
			->viewVars($body)
			->from( array( 'g031j156@s.iwate-pu.ac.jp' => 'タクシェア！'))
			->to($address)
			->subject('タクシェア会員仮登録完了のお知らせ')
			->send();
		//debug($mailRespons);
		
	} 

	function _signature($nLengthRequired = 32){
	    $sCharList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
	    mt_srand();
	    $sRes = "";
	    for($i = 0; $i < $nLengthRequired; $i++)
	        $sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
	    return $sRes;
	}
}
?>