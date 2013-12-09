<!-- <div class="container"> -->
	<div class="row">
		<div class="col-xs-6" style="padding-right:10px">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2>依頼主<br></h2>
				</div>
				<div class="panel-body">
					<h3>ユーザー名：<?php echo $client['User']['username'] ?></h3>
					<h3>アドレス：<?php echo $client['User']['address'] ?></h3>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2>コンタクト依頼者一覧</h2>
				</div>
				<div class="panel-body">
					<ui style="list-style-type:none;">
						<?php
						foreach ($post['Contact'] as $key => $contact){
						echo "<li><h3>".$contact['User']['username'];
						if($post['Post']['user_id'] == $user){
							echo '<button type="button" class="btn btn-default" style="float:right">';
							echo $this->Html->link('承認する', array('action' => 'contact', $contact['User']['id']));
							echo '</button></h3></li>';
							/*echo '<a href="#" class="btn btn-success active" role="button" style="float:right">承認する</a></h3></li>';*/
							}
						}
						?>
					</ui>
				</div>
			</div>
			
		</div>
		<div class="col-xs-6" style="padding-right:10px">
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
					echo '<button type="button" class="btn btn-default btn-lg">';
					echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id']));
					echo '</button><br><br>';
					echo '<button type="button" class="btn btn-default btn-lg">'; 
				 	echo $this->Html->link('削除', array('action' => 'delete', $post['Post']['id']));
				 	echo '</button>';
				}else{
					echo '<button type="button" class="btn btn-default btn-lg">';
					echo $this->Html->link('コンタクトを取る！', array('action' => 'offer', $user, $view));
					echo '</button>';
				}
				
				?>
			</p>
		</div>
	</div>
</div>
