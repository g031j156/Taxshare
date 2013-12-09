<?php
class Post extends AppModel {
	var $name = 'Post';
	var $useTable = 'posts';
	// var $virtualFields = array(
	// 	'start_id' => 'Start.name', //Post.start_idにVenue.nameを充てる
	// 	'goal_id' => 'Goal.name'	//Post.goal_idにVenue.nameを充てる 
	// 	);
		
	public $belongsTo = array(
			//'仮想テーブル名'=>array('className'=> '取得先テーブル名', 'foreignKey' => '取得元カラム名')
			'Start' =>array('className' => 'Venue','foreignKey' => 'start_id'),	
			'Goal' =>array('className' => 'Venue','foreignKey' => 'goal_id')	//Post.goal_idにVenue.nameを充てる

		);

	public $hasMany = 'Contact';

	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
            'message' => '名前を入力してください！'
		),
		'password' => array(
			'rule' => array('between', 5, 12),
			'allowEmpty' => false,
            'message' => '5～12文字でパスワードを入力してください！'
		),
		'contact' => array(
			'rule' => 'notempty'
		),
        /*'departure' => array(
            'rule' => 'notEmpty',
            'required' => true,
            'message' => '出発地を入力してください！'
        ),
        'destination' => array(
            'rule' => 'notEmpty',
            'required' => true,
            'message' => '目的地を入力してください！'
        )*/
		
	);
}

?>