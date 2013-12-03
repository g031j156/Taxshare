<?php
class Contact extends AppModel {
	var $name = 'Contact';
	var $useTable = 'contacts';
	var $useModel = 'User';
	public $belongsTo = array('Post', 'User');
}
?>