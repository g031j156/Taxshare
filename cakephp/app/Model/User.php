<?php
class User extends AppModel{
	var $name = 'User';
	public $hasMany = array('Post','Contact');//array('contacts' =>
 //        array(
 //            'className' => 'contacts',
 //            'conditions' => 'contacts.user_id = users.id',
 //            'order' => 'users.name ASC',
 //            'foreignKey' => ''));


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
        ),	
		'gender' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '性別を選択してくだい'
            )
        ),	
		'grade' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '学年を選択してくだい'
            )
        ),	
		'faculty' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '学部を選択してくだい'
            )
        ),	
		'data["User"]["hobby"]' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '趣味を入力してください'
            )
        ),	
		'club' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '所属サークル等を入力してください'
            )
        ),	
		'from' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '出身地を選択してください'
            )
        ),	
		'subculture' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '好きなものを入力してください'
            )
        ),	
		'capacity' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '最大乗車可能人数を入力してくだい'
            )
        )


    );
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