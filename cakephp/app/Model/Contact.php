<?php
class Contact extends AppModel {
	var $name = 'Contact';
	var $useTable = 'contacts';
	public $belongsTo = array('Post', 'User');
}
?>