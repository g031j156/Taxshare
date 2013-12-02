<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail','Network/Email');

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');
	
    public $components = array('Auth');
    public $uses = array('Post', 'User', 'Venue');

	public function beforeFilter() {
    parent::beforeFilter();
    $Auth_user = $this->Session->read('Auth_user');
    $this->set('Auth_user', $Auth_user);
    //$this->Auth->allow('add'); // ユーザーに自身で登録させる
	}

    public function index() {	//indexメソッド
        $data = $this->User->find('all', array('order'=>'User.id desc'));
        $this->set('data', $data);
		
        $this->set('posts', $this->Post->find('all'));
		//if予定時間前 → 表示
		//else if予定時間後 → 非表示
    }

    public function driver(){
    	$this->set($this->User->find('all'));
    }
	
	public function view($id = null) {	//viewメソッド	
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
		
        $post = $this->Post->findById($id);
        $client = $this->User->findById($post['Post']['user_id']);
        $this->set('client',$client);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('user', $this->Auth->user('id'));
        $this->set('post', $post);
    }
	
	public function add() {	//addメソッド
		$this->set('venue', $this->Venue->find('list',array('fields' => array('Venue.name'))));
		$this->request->data['Post']['user_id'] = $this->Auth->user('id');
        if ($this->request->is('post')) {						//リクエストメソッドがpostだったら以下を実行
        	$this->Post->create();								
            if ($this->Post->save($this->request->data)) {			//リクエストデータを保存できたら以下を実行	
            	
                $this->Session->setFlash('Your post has been saved.');	//リダイレクト後にこのメッセージを表示
                $this->redirect(array('action' => 'index'));			//リダイレクト先のURLを指定
            } else {
            	var_dump($this->Post);
                $this->Session->setFlash('Unable to add your post.');
            }
        }
    }
	 
	public function edit($id = null) {	//editメソッド
	    if (!$id) {													//idが存在しない場合エラーメッセージ
	        throw new NotFoundException(__('Invalid post'));
	    }
		
	    $post = $this->Post->findById($id);							//idのpostが存在しない場合エラーメッセージ
	    if (!$post) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    $this->set('venue', $this->Venue->find('list',array('fields' => array('Venue.name'))));
		$this->set('post', $this->Post->findById($id));

	    if ($this->request->is('post') || $this->request->is('put')) {
	        $this->Post->id = $id;											//編集したidを渡してやることで新規投稿でないことを判断
	        if ($this->Post->save($this->request->data)) {					//編集したデータを保存したら以下を実行
	            $this->Session->setFlash('予定を変更しました。');					//リダイレクト後にこのメッセージを表示
	            $this->redirect(array('action' => 'index'));				//リダイレクト先のURLを指定
	        } else {
	            $this->Session->setFlash('Unable to update your post.');
	        }
	    }
	
	    if (!$this->request->data) {										//編集内容が空の場合編集前のデータをそのままセット
	        $this->request->data = $post;
	    }
	}

	public function delete($id) {
	     if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

	    if ($this->Post->delete($id)) {
	        $this->Session->setFlash(__('スケジュールを削除しました。'));
	        return $this->redirect(array('action' => 'index'));
	    }
	}

	public function offer(){	//入札関数

	}

	public function contact(){	//マッチング関数

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
}
?>