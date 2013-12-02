<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel{
	public $hasMany = 'Contact';
	public $validate = array(	
		'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '学内アドレスを入力してください'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('between', 5, 12),
                'allowEmpty' => false,
                'message' => '5〜12文字で入力してください'
            )
        ));
		/*'address' => array(
			'rule' => array('domain'),
			'required' => true,
			'allowEmpty' => false,
			'message' => '学内アドレスを入力してください！'
		)
	);
	
	public function domain($data){
		if(strpos($data['address'], 'iwate-pu.ac.jp') == false){
			return false;
		}else{
			return true;
		}
	}*/
	
	public function beforeSave($option = array()) {
		if (isset($this->data[$this->alias]['password'])) {
       	 $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    	}
    	return true;
	}
}
?>