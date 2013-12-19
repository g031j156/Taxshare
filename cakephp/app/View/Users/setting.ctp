<h1>アカウント設定</h1>

<ul class="nav nav-tabs">
  <li class="active"><a href="#set1" data-toggle="tab">登録情報変更</a></li>
  <li><a href="#set2" data-toggle="tab">ドライバー登録</a></li>
  <li><a href="#set3" data-toggle="tab">退会</a></li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="set1">
		<h3>アカウント情報変更</h3>
		<?php
		echo $this->Form->create('User');
		echo $this->Form->input('username', array('label' => 'ユーザーID', 'type' => 'text', 'value' => $Auth_user['username']));
		echo $this->Form->input('password', array('label' => 'パスワード', 'type' => 'password'));
		echo $this->Form->submit('変更', array('id' => 'edit'));
		echo $this->Form->end();
		?>
	</div>

	<div class="tab-pane" id="set2">
		<h3>ドライバー登録</h3>
		<p>ドライバー登録することで自分が運転して誰かを乗せて行くことができるようになります。</p>

		<form method="post" action="setting" accept-charset="utf-8" role="form" class="form-horizontal">
			<input type="hidden" name="data[User][user_id]" value=<?php echo $Auth_user['id']?>>
			<label for="gender" class="required">性別</label>
			<div class="radio">
				<label>
					<input type="radio" name="data[User][gender]" id="gender" value="male" checked>
					男性
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="gender" id="data[User][gender]" value="female">
					女性
				</label>
			</div>
			<div class="input select required">
				<label for="faculty">所属学部</label>
				<select class="form-control input-lg" name="data[User][faculty]" id="faculty">
					<option value="総合政策学部">総合政策</option>
					<option value="ソフトウェア情報学部">ソフトウェア情報</option>
					<option value="社会福祉学部">社会福祉</option>
					<option value="看護学部">看護</option>
					<option value="短期大学部">短期大</option>
				</select>
			</div>
			<div class="input select required">
				<label for="grade">学年</label>
				<select class="form-control input-lg" name="data[User][grade]" id="grade">
					<option value="1">学部１年</option>
					<option value="2">学部２年</option>
					<option value="3">学部３年</option>
					<option value="4">学部４年</option>
					<option value="5">修士１年</option>
					<option value="6">修士２年</option>
				</select>
			</div>
			<div class="form-group required">
			    <label for="hobby">趣味</label>
			    <input type="text" class="form-control" name="data[User][hobby]" id="hobby">
			</div>
			<div class="form-group required">
			    <label for="club">所属サークルや部活</label>
			    <input type="text" class="form-control" name="data[User][club]" id="club">
			</div>
			<div class="form-group required">
			    <label for="from">出身地</label>
			    <input type="text" class="form-control" name="data[User][from]" id="from">
			</div>
			<div class="form-group required">
			    <label for="subculture">好きな○○</label>
			    <input type="text" class="form-control" name="data[User][subculture]" id="subculture" placeholder="映画、音楽、マンガ、ドラマ、アニメ、小説など">
			</div>
			<div class="form-group">
				<label for="comment">コメント</label>
				<input type="text" class="form-control" name="data[User][comment]" id="comment" placeholder="最後に一言">
			</div>
			<div class="input select required">
				<label for="capacity">最大乗車可能人数</label>
				<select class="form-control input-lg" name="data[User][capacity]" id="capacity">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10〜</option>
				</select>
			</div>
			<input id="submit" value="登録" type="submit" />

		</form> 
		

		<?php
		// echo $this->Form->create('User');
		// echo $this->Form->input('username', array('label' => 'ユーザーID', 'type' => 'text', 'value' => $Auth_user['username']));
		// echo $this->Form->input('faculty', array('label' => '所属学部　　　　　', 'type' => 'select', 'options' => array(
		// 						'総合政策' => '総合政策',
		// 						'ソフトウェア情報' => 'ソフトウェア情報',
		// 						'看護' => '看護',
		// 						'社会福祉' => '社会福祉')));
		// echo $this->Form->input('capacity', array('label' => '最大乗車可能人数　', 'type' => 'select', 'options' => array(
		// 						'1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',
		// 						'6' => '6', '7' => '7', '8' => '8', '9' => '9', '10〜' => '10〜')));
		// echo $this->Form->input('intro', array('label' => '自己紹介', 'type' => 'text'));
		// echo $this->Form->input('上記の内容でドライバー登録します。', array('type' => 'checkbox'));
		// echo $this->Form->end('登録');
		?>
	</div>

	<div class="tab-pane" id="set3">
		本当に退会しますか？
	</div>
</div>

<script>
    $(function(){
    	$('#edit').on('click',function(){
    		alert("設定を変更しました。");	
    	})
    	

        setTimeout(function(){
            $('#flashMessage').fadeOut("slow");
        }, 800);
    });
</script>