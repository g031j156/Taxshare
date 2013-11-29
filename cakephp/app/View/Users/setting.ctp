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
		echo $this->Form->input('password', array('label' => 'パスワード', 'type' => 'text'));
		echo $this->Form->end('変更');
		?>
	</div>

	<div class="tab-pane" id="set2">
		<?php
		echo "<h3>ドライバー登録</h3>";
		echo $this->Form->create('User');
		echo $this->Form->input('car_manufacturer', array('label' => 'メーカー', 'type' => 'select', 'options' => array(
								'トヨタ' => 'トヨタ','ホンダ' => 'ホンダ','日産' => '日産','マツダ' => 'マツダ',
								'スバル' => 'スバル','三菱' => '三菱','スズキ' => 'スズキ','ダイハツ' => 'ダイハツ',
								'海外メーカー' => '海外メーカー','その他' => 'その他')));
		echo $this->Form->input('car_name', array('label' => '車種', 'type' => 'text'));
		echo $this->Form->end('登録');
		?>
	</div>

	<div class="tab-pane" id="set3">
		本当に退会しますか？
	</div>
</div>