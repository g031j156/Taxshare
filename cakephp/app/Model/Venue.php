<?php
class Venue extends AppModel{
	var $name = 'venues';
    var $useTable = 'venues';
    var $belongsTo = array('posts' =>
        array(
            'className' => 'posts',
            'conditions' => 'posts.postsid = venues.id',
            'order' => 'venues.id ASC',
            'foreignKey' => ''));
}
?>