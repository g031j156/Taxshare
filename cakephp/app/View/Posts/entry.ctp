<!-- File: /app/View/Posts/entry.ctp -->

<h1>New entry</h1>
<?php
echo $this->Form->create('User');
//echo $this->Form->select('dpflag',array(0=>'乗せる',1=>'乗る'),0,array('empty'=>false));
echo $this->Form->input('name');
echo $this->Form->input('password');
echo $this->Form->input('address', array('label' => 'Email', 'default' => '@s.iwate-pu.ac.jp'));
echo $this->Form->end('Save Post');
?>