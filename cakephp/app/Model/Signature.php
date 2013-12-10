<?php
class Signature extends AppModel{
	var $name = 'Signature';
	var $useTable = 'signatures';

	public $validate = array(
		'username' => array(
			'rule' => 'notEmpty',
            'message' => '名前を入力してください！'
		),
		'password' => array(
			'rule' => array('between', 5, 12),
			'allowEmpty' => false,
            'message' => '5～12文字でパスワードを入力してください！'
		)
	);

	// public function beforeSave($option = array()) {
	// 	if (isset($this->data[$this->alias]['password'])) {
			
 //       		$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
 //    	}
 //    	return true;
	// }
}
?>