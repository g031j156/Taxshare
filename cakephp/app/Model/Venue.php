<?php
class Venue extends AppModel{
	var $name = 'Venue';
    var $useTable = 'venues';
    var $belongsTo = 'Post';//array('posts' =>
    //     array(
    //         'className' => 'posts',
    //         'conditions' => 'posts.id = Venue.id',
    //         'order' => 'venues.id ASC',
    //         'foreignKey' => ''));
}
?>