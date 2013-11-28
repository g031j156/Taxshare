<!-- File: /app/View/Posts/top.ctp -->

<h1>タクシェア！</h1>
<?php
echo $this->Form->create('Post');
//echo $this->Form->select('dpflag',array(0=>'乗せる',1=>'乗る'),0,array('empty'=>false));
echo $this->Form->input('name');
echo $this->Form->input('password');
echo $this->Form->end('login');
echo $this->Html->link('New entry', array('controller' => 'users', 'action' => 'entry'));
?>