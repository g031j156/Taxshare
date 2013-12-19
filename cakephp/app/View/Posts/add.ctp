<!-- File: /app/View/Posts/add.ctp -->

<h1>予定登録</h1>

<!-- <p>日付: <input type="text" id="datepicker" /></p>
<p id="test"></p> -->
<?php
// echo $this->Form->create('Post');
// echo $this->Form->input('dpflag', array('label' => 'タイトル', 'type' => 'select', 'options' => array(
// 						'0'=>'乗せるよ！',			/*0の場合乗せる人*/
// 						'1'=>'乗りたい！',			/*1の場合乗りたい人*/
// 						),'default' => '0'));
// echo $this->Form->input('start_id', array('label' => '出発地', 'type' => 'select', 'options' => $venue));
// echo $this->Form->input('goal_id', array('label' => '目的地', 'type' => 'select', 'options' => $venue));
// //echo $this->Form->input('encount', array('label' => '出発時間'));
// echo $this->Form->end('登録');
?>

<form action="add" id="PostAddForm" method="post" accept-charset="utf-8">
	<div style="display:none;">
		<input type="hidden" name="_method" value="POST">
	</div>
	<div class="input select">
		<label for="PostDpflag">タイトル</label>
		<select class="form-control input-lg" name="data[Post][dpflag]" id="PostDpflag">
			<?php if($user == 1):?><option value="0">乗せるよ！</option><?php endif;?>
			<option value="1" selected="selected">乗りたい！</option>
		</select>
		※「乗せるよ！」のスケジュール登録をする際はドライバー登録を行ってください。
	</div>
	<div class="input select">
		<label for="PostStartId">出発地</label>
		<select class="form-control input-lg" name="data[Post][start_id]" id="PostStartId">
			<option value="1">滝沢駅</option>
			<option value="2">県大</option>
			<option value="3">巣子駅</option>
			<option value="4">厨川駅</option>
			<option value="5">青山駅</option>
			<option value="6">盛岡駅</option>
		</select>
	</div>
	<div class="input select">
		<label for="PostGoalId">目的地</label>
		<select class="form-control input-lg" name="data[Post][goal_id]" id="PostGoalId">
			<option value="1">滝沢駅</option>
			<option value="2">県大</option>
			<option value="3">巣子駅</option>
			<option value="4">厨川駅</option>
			<option value="5">青山駅</option>
			<option value="6">盛岡駅</option>
		</select>
	</div>
	<div class="input select">
		<label for="PostMember">希望同乗人数</label>
		<select class="form-control input-lg" name="data[Post][member]" id="PostMember">
			<option value="1">1人</option>
			<option value="2">2人</option>
			<option value="3">3人</option>
			<option value="4">4人</option>
			<option value="5">5人</option>
			<option value="6">6人</option>
			<option value="7">7人</option>
			<option value="8">8人</option>
		</select>
	</div>
	<div class="submit">
		<input type="submit" value="登録">
	</div>
</form>


</h3>

