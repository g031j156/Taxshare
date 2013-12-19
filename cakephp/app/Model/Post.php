<?php
class Post extends AppModel {
	var $name = 'Post';
	var $useTable = 'posts';
		
	public $belongsTo = array(
			//'仮想テーブル名'=>array('className'=> '取得先テーブル名', 'foreignKey' => '取得元カラム名')
			'Start' =>array('className' => 'Venue','foreignKey' => 'start_id'),	
			'Goal' =>array('className' => 'Venue','foreignKey' => 'goal_id')	//Post.goal_idにVenue.nameを充てる

		);

	public $hasMany = 'Contact';

	public $validate = array(
		// 'start_id' => array(
		// 	'rule' => '')
	// 	'dpflag' => array(
	// 		'rule' => array('driverconditions', 1),
	// 		'message' => 'ドライバー登録がされていないため依頼できません。'
	// 		)
		// 'password' => array(
  //           'required' => array(
  //               'rule' => array('between', 5, 12),
  //               'allowEmpty' => false,
  //               'message' => '5〜12文字で入力してください'
  //           )
  //       )
	);

	function driverconditions($flag, $id){
		$data = $this->User->findById($id);
		if($data['User']['driverflag'] == 0 && $flag['User']['dpflag'] == 0){
			return $data['User']['driverflag'] != 1;
		}
	}

	
}

?>