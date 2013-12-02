<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>
		タクシェア！
	</title>

	<?php
		//echo $this->Html->meta('icon');

		echo $this->Html->css('taxshare.generic');
		echo $this->Html->css('bootstrap');
		echo $this->Html->script('jquery-1.7.min');
		echo $this->Html->script('bootstrap');
		
	?>
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

	<link rel="shortcut icon" href="../img/taxshare/icon_16.png" type="image/png" />
	<link rel="icon" href="../img/taxshare/icon_16.png" type="image/png" />
</head>
<body>
	<div class="row" id="content">
		<div class="col-sm-3">	
			<div class="row" align="center">
				<?php echo $this->Html->image('taxshare/title_icon.png', array('width'=>'350','height'=>'95')); ?>
				<div class="col-sm-6">
					<?php echo $this->Html->image('taxshare/icon.png', array('width'=>'140','height'=>'140')); ?>
				</div>
				<div class="col-sm-6" align="left">
					<h3><?php echo $Auth_user['username']; ?></h3>
					<ul>
						<li>乗車可能人数</li>
						<li>ポイント</li>
					</ul>
				</div>
			</div>
			<div id="userslog" align="center">
				過去のログとか...<br>
				（誰を乗せたか）<br>
				（総移動距離とか）<br>
				（乗せた人数とか）<br>
				・<br>
				・<br>
				・<br>
			</div>
		</div>
		
		<div class="col-sm-9" style="border-left:1px solid #666">	
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".target">
						<span class="icon-bar"></span>
				      	<span class="icon-bar"></span>
				      	<span class="icon-bar"></span>
				    </button>
		        	<a class="navbar-brand">タクシェア！</a>
		    	</div>
		    	<div class="collapse navbar-collapse target">
			      	<ul class="nav navbar-nav">
				      	<li><a href="/~offside_now/yama/cakephp/posts/index">一覧</a></li>
				        <li><a href="/~offside_now/yama/cakephp/posts/add">予定登録</a></li>
				    	<li><a href="#">使い方</a></li>
				    	<li><a href="/~offside_now/yama/cakephp/posts/driver">ドライバー紹介</a></li>
				    </ul>
				    <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">メニュー <b class="caret"></b></a>
						    <ul class="dropdown-menu">
				    			<li><?php echo $this->Html->link('アカウント設定', array('controller'=>'users', 'action'=>'setting')) ?></li>
				    			<li><a href="#">ヘルプ</a></li>
								<li><a href="#">問い合わせ</a></li>
								<li class="divider"> </li>
							    <li><?php echo $this->Html->link('ログアウト', array('controller'=>'users', 'action'=>'logout')) ?></li>
						    </ul>
					    </li>
				    </ul>	
			    </div>		        
		    </nav>
		    <div id="content">
				<?php echo $this->Session->flash(); ?>
			    <?php echo $this->fetch('content'); ?>
			</div>	
		</div>
	</div>
		
	

	<script>
	$(function(){
		setTimeout(function(){
			$('#flashMessage').fadeOut("slow");
		}, 800);
	});
	</script>
</body>
</html>
