<?php
class Driver extends AppModel {
	public $validate = array(
		'username' => array(
			'rule' => 'notEmpty',
            'message' => '名前を入力してください！'
		)
	);
}
?>