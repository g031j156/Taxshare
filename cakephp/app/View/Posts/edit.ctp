<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('dpflag', array('label' => 'タイトル', 'type' => 'select', 'options' => array(
						'0'=>'乗せるよ！',			/*0の場合乗せる人*/
						'1'=>'乗りたい！',			/*1の場合乗りたい人*/
						),'default' => '0'));
echo $this->Form->input('start_id', array('label' => '出発地', 'type' => 'select', 'options' => $venue, 'selected' => $post['Start']['id']));
echo $this->Form->input('goal_id', array('label' => '目的地', 'type' => 'select', 'options' => $venue, 'selected' => $post['Goal']['id']));
echo $this->Form->input('encount', array('label' => '出発時間'));
echo $this->Form->input('limit', array('label' => '締切日時'));
    echo $this->Form->end('変更');							//submit
?>