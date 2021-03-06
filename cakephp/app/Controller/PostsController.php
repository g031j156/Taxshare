<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail','Network/Email');
App::import('Vendor','facebook', array('file' => 'facebook'.DS.'src'.DS.'facebook.php'));//sdkのインポート

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');
	
    public $components = array('Auth');
    public $uses = array('Post', 'User', 'Venue', 'Contact');

	private function createFacebook() {
        return new Facebook(array(
                'appId' => '617693598296828',
                'secret' => 'a7ccdf4efe95336173c23e108e4727ac'
        ));
    }
	public function beforeFilter() {
    parent::beforeFilter();
    // $Auth_user = 
    // $user_log = 
    $this->set('Auth_user', $this->Session->read('Auth_user'));
    //$this->log($this->Session->read('user_log'), 'log');
    $this->set('user_log', $this->Session->read('user_log'));
	}

    public function index() {	//indexメソッド
        $this->set('data', $this->User->find('all', array('order'=>'User.id desc')));
		$date = date("Y-m-d H:i:s", time());	//現在時刻取得
		//出発時間を過ぎたスケジュールのみ取得
		$schedule = $this->Post->find('all',
				        	array('conditions' => array("AND" => array(
												'Post.encount BETWEEN ? AND ?' => array("0000-00-00 00:00:00", $date),
												'Post.stateflag' => 0))
				        	)
		);
        
        //stateflag = 1　の処理
        foreach($schedule as $key => $schedule){
        	$this->Post->read(null, $schedule['Post']['id']);
        	$this->Post->set('stateflag', 1);
        	$this->Post->save();
        }
        $this->set('posts', $this->Post->find('all'));
    }
	
	public function view($id) {	//viewメソッド	
        if (!$id) {
            throw new NotFoundException(__('そのようなスケジュールは登録されていません！'));
        }
        
        $this->Post->recursive = 2;
        $this->Post->Contact->unbindModel(array(
		    'belongsTo' => array('Post')));
        $this->Post->User->unbindModel(array(
		    'hasMany' => array('Post', 'Contact')));
        $post = $this->Post->findById($id);
        $this->log($post, 'log');
        $client = $this->User->findById($post['Post']['user_id']);
        
        $this->set('client',$client);					//スケジュール投稿者		
        $this->set('view', $id);						//スケジュールid
        $this->set('user', $this->Auth->user('id'));	//ログイン中ユーザ
        $this->set('post', $post);						//スケジュール内容
    }
	
	public function add() {	//addメソッド
		$this->set('user', $this->Auth->user('driverflag'));
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
	        throw new NotFoundException(__('編集するスケジュールはみつかりませんでした。'));
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

	function offer($user, $view){	//入札関数
		// if (!) {
  //           throw new NotFoundException(__('入札するスケジュールがみつかりませんでした。'));
  //       }
        //重複コンタクトを防ぐ
        if(!$this->Contact->findByUser_idAndPost_id($user, $view)){
        	$this->Contact->create();
		$data = array('Contact' => array('user_id' => $user,'post_id' => $view));
		$this->Contact->save($data);
		$this->redirect('index');	
        }else{
        	throw new NotFoundException(__('既にコンタクト依頼済みです！'));	
        }

		
	}

	public function usage(){	//使い方ページ

	} 

	public function contact($contact, $id){	//マッチング関数
		if (!$contact) {
            throw new NotFoundException(__('そのようなコンタクトは依頼されていません！'));
        }
		if (!$id) {
            throw new NotFoundException(__('そのようなコンタクトは依頼されていません！'));
        }

        $this->Post->read(null, $id);
        $this->Post->set('stateflag', 1);
        $this->Post->set('contacter_id', $contact);
        $this->Post->save();

		$this->Post->recursive = 2;
		$this->Post->Contact->unbindModel(array(
		    'belongsTo' => array('Post')));
        $this->Post->User->unbindModel(array(
		    'hasMany' => array('Post', 'Contact')));
        $win_body = $this->Post->findById($id);
      //   $this->log($win_body, 'log');
		//$contact 宛に落札成功のメールを送信する win_body(落札者宛メール本文)
        $this->_sendmail($contact, $win_body, 0);
        //$this->_sendmail($contact, $lose_body, 1);
		//$contact 以外に落札失敗のメールを送信する lose_body(落札者以外宛メール本文)
		$this->redirect(array('action' => 'index'));
	}

	function _sendmail($id, $msg, $flag){
		$user = $this->User->findById($id);

		$email = new CakeEmail('gmail');
		$body = array('msg' => $msg);
		// 送信！
		if($flag == 0){
			$address = array($user['User']['address'], $msg['Contact']['0']['User']['address']);
		
			$mailRespons = $email->emailformat('text')
				->template('maching_win','text_layout')
				->viewVars($body)
				->from( array( 'g031j156@s.iwate-pu.ac.jp' => 'タクシェア！'))
				->to($address)
				->subject('マッチングに成功しました！')
				->send();
			//debug($mailRespons);
		}else if($flag == 1){
			// $mailRespons = $email->emailformat('text')
			// 	->template('maching_lose','text_layout')
			// 	->viewVars($body)
			// 	->from( array( 'g031j156@s.iwate-pu.ac.jp' => 'タクシェア！'))
			// 	->to($address)
			// 	->subject('マッチングに失敗しました...')
			// 	->send();
			// debug($mailRespons);
		}		
		
	} 		
}
?>