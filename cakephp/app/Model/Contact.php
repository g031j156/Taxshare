<?php
class Contact extends AppModel {
	var $name = 'Contact';
	var $usetable = 'contacts';

	//var $virtualFields = array('user_id' => 'tender.username'); //Post.start_idにVenue.nameを充てる
		
		
	// public $belongsTo = array(
			//'仮想テーブル名'=>array('className'=> '取得先テーブル名', 'foreignKey' => '取得元カラム名')
			// 'tender' =>array('className' => 'User','foreignKey' => 'user_id'),
			// 'Post'
			// );
	public $belongsTo = array('Post', 'User');
}
?>