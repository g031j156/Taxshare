<h1>アカウント設定</h1>

<ul class="nav nav-tabs">
  <li class="active"><a href="#set1" data-toggle="tab">登録情報変更</a></li>
  <li><a href="#set2" data-toggle="tab">ドライバー登録</a></li>
  <li><a href="#set3" data-toggle="tab">退会</a></li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="set1">
		<?php
		echo "<h3>アカウント情報変更</h3>";
		echo $this->Form->create('User');
		echo $this->Form->input('username', array('label' => 'ユーザーID', 'type' => 'text', 'value' => $Auth_user['username']));
		echo $this->Form->input('password', array('label' => 'パスワード', 'type' => 'password'));
		echo $this->Form->end('変更');
		?>
	</div>

	<div class="tab-pane" id="set2">
		
		<h3>ドライバー登録</h3>
		<p>ドライバー登録することで自分が運転して誰かを乗せて行くことができるようになります。</p>
		<?php
		echo $this->Form->create('driver');
		echo $this->Form->input('username', array('label' => 'ユーザーID', 'type' => 'text', 'value' => $Auth_user['username']));
		echo $this->Form->input('faculty', array('label' => '所属学部　　　　　', 'type' => 'select', 'options' => array(
								'総合政策' => '総合政策',
								'ソフトウェア情報' => 'ソフトウェア情報',
								'看護' => '看護',
								'社会福祉' => '社会福祉')));
		echo $this->Form->input('capacity', array('label' => '最大乗車可能人数　', 'type' => 'select', 'options' => array(
								'1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',
								'6' => '6', '7' => '7', '8' => '8', '9' => '9', '10〜' => '10〜')));
		echo $this->Form->input('intro', array('label' => '自己紹介', 'type' => 'text'));
		echo $this->Form->input('上記の内容でドライバー登録します。', array('type' => 'checkbox'));
		echo $this->Form->end('登録');
		?>
	</div>

	<div class="tab-pane" id="set3">
		本当に退会しますか？
	</div>
</div>