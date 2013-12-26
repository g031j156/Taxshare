<!-- <div class="container"> -->


<div class="row">
	<?php
	$now = date("Y-m-d H:i:s", time());
	$now = (string)$now;
	if($post['Post']['stateflag'] == 1 || strcmp($post['Post']['encount'],$now) < 0):
	?>
		<div class="alert alert-danger">
		<button class="close" data-dismiss="alert">&times;</button>
		<h1>既に締切られたスケジュールです!</h1>
	</div>
	<?php endif; ?>
	
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
						if($post['Post']['user_id'] == $user && $post['Post']['stateflag'] == 0){
							if(strcmp($post['Post']['encount'],$now) > 0 && $post['Post']['encount'] != 1){
								echo '<button type="button" class="btn btn-default" style="float:right">';
								echo $this->Html->link('承認する', array('action' => 'contact', $contact['User']['id'], $view));
								echo '</button></h3></li>';
								/*echo '<a href="#" class="btn btn-success active" role="button" style="float:right">承認する</a></h3></li>';*/
							}
						}
					}
					?>
				</ui>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2>コンタクト者</h2>
			</div>
			<div class="panel-body">
				<?php
				foreach ($post['Contact'] as $key => $contact){
				echo "<li><h3>".$contact['User']['username'];
				if($post['Post']['user_id'] == $user && $post['Post']['stateflag'] == 0){
					echo '<button type="button" class="btn btn-default" style="float:right">';
					echo $this->Html->link('承認する', array('action' => 'contact', $contact['User']['id'], $view));
					echo '</button></h3></li>';
					/*echo '<a href="#" class="btn btn-success active" role="button" style="float:right">承認する</a></h3></li>';*/
					}
				}
				?>
			</div>
		</div>
		
	</div>

	<div class="col-xs-6" style="padding-right:10px">
		<div class="panel panel-success">
		<div class="panel-heading">
			<h1>
			<?php if($post['Post']['dpflag'] == 0): ?>
				<h3>乗せるよ！</h3>
			<?php elseif($post['Post']['dpflag'] == 1): ?>
				<h3>乗りたい！
					<span class='label label-info'>希望同乗人数：<?php echo $post['Post']['member']."人"; ?> </span>
				</h3>	
			<?php endif;?>
		</h1>
		</div>

		<div class="panel-body">
		
			<?php 
			echo "<h3>".$post['Goal']['name']." から ".$post['Start']['name']." まで <br /><br />";
			echo "出発日時：".$post['Post']['encount']."<br /><br /></h3>"; 
			?>
			<?php 
			//$this->log($post, 'log');
			if($post['Post']['user_id'] == $user){
				if($post['Post']['stateflag'] == 0){
					echo '<button type="button" class="btn btn-default btn-lg">';
					echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id']));
					echo '</button><br><br>';
				}
				echo '<button type="button" class="btn btn-default btn-lg">'; 
			 	echo $this->Html->link('削除', array('action' => 'delete', $post['Post']['id']));
			 	echo '</button>';
			}else{
				if($post['Post']['stateflag'] != 1 && strcmp($post['Post']['encount'],$now) > 0){
					echo '<button type="button" class="btn btn-default btn-lg">';
					echo $this->Html->link('コンタクトを取る！', array('action' => 'offer', $user, $view));
					echo '</button>';
				}
			}
			?>
		</div>
	</div>
	</div>

</div>
