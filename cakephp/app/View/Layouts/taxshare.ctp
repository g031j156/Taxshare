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
	<link rel="shortcut icon" href="../img/taxshare/icon_16.png" type="image/png" />
	<link rel="icon" href="../img/taxshare/icon_16.png" type="image/png" />
	<title>
		タクシェア！
	</title>

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('taxshare.generic');
		echo $this->Html->css('bootstrap');
		echo $this->Html->script('bootstrap');
		
	?>
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
</head>
<body>
	<div id="container">
		<div class="row">
			<div class="col-xs-3">
				<div class="row" align="center">
					<?php echo $this->Html->image('taxshare/title_icon.png', array('width'=>'360','height'=>'95')); ?>
					<div class="col-xs-6">
						<?php echo $this->Html->image('taxshare/icon.png', array('width'=>'140','height'=>'140')); ?>
					</div>
					<div class="col-xs-6" align="left">
						<h3><?php pr($Auth_user); ?>ユーザー名</h3>
						<ul>
							<li>車種</li>
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
			
			<div class="col-xs-9">	
				<nav class="navbar navbar-default">
					<div class="navbar-header">
			        	<a class="navbar-brand">タクシェア！</a>
			    	</div>
			      	<ul class="nav navbar-nav">
				      	<li class=""><a href="/~offside_now/yama/cakephp/posts/index">一覧</a></li>
				        <li class=""><a href="/~offside_now/yama/cakephp/posts/add">予定登録</a></li>
				    	<li ><a href="#">使い方</a></li>
				    	<li><?php echo $this->Html->link('ログアウト', array('controller'=>'/users', 'action'=>'logout')) ?></li>
				    </ul>
				    <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">メニュー <b class="caret"></b></a>
						    <ul class="dropdown-menu">
				    			<li><a href="#">アカウント設定</a></li>
				    			<li><a href="#">ヘルプ</a></li>
								<li><a href="#">問い合わせ</a></li>
								<li class="divider"></li>
							    <li><?php echo $this->Html->link('ログアウト', array('controller'=>'users', 'action'=>'logout')) ?></li>
						    </ul>
					    </li>
				    </ul>			        
			    </nav>
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
