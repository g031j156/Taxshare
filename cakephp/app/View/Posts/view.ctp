<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<h1>依頼主<br></h1>
			<h2><?php echo $client['User']['username'] ?></h2>
			<h2><?php echo $client['User']['address'] ?></h2>
		</div>
		<div class="col-sm-6">
			<h1>
				<?php
				//$post = $this->Post->findById($id);;
				if($post['Post']['dpflag'] == 0){
					echo "乗せるよ！";
				}else if($post['Post']['dpflag'] == 1){
					echo "乗りたい！";	
				}
				?>
			</h1>
			<p>
				<?php echo ($post['Post']['start_id']); ?>
				<?php echo " から "?>
				<?php echo ($post['Post']['goal_id']); ?>
				<?php echo " まで "?><br /><br />
				出発日時: <?php echo $post['Post']['encount']; ?><br />
				締切日時: <?php echo $post['Post']['limit']; ?><br />
				<br />
				<?php 
				if($post['Post']['user_id'] == $user){
					echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id'])); 
				 	echo $this->Form->postlink('削除', array('action' => 'delete', $post['Post']['id']));
				}else{
					echo $this->Form->create('Post');
					echo $this->Form->input('contact', array('label' => false, 'placeholder' => 'コンタクトを取る'));
					echo $this->Form->submit('送信！');
				}
				?>
			</p>
		</div>
	</div>
</div>
