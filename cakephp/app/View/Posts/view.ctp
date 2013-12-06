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
				<?php echo ($post['Goal']['name']); ?>
				<?php echo " から "?>
				<?php echo ($post['Start']['name']); ?>
				<?php echo " まで "?><br /><br />
				出発日時: <?php echo $post['Post']['encount']; ?><br />
				<br />
				<?php 
				if($post['Post']['user_id'] == $user){
					echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id'])); 
				 	echo $this->Html->link('削除', array('action' => 'delete', $post['Post']['id']));
				}else{
					echo '<button type="button" class="btn btn-default">';
					echo $this->Html->link('送信！', array('action' => 'offer', $user, $view));
					echo '</button>';
				}
				foreach ($post['Contact'] as $key => $contact){
					echo $contact['User']['username'];
				}
				?>
			</p>
		</div>
	</div>
</div>
