<h1>ドライバー紹介</h1>
<h3 class="text-danger">※最大乗車人数はドライバーを含めた人数です！</h3>
<div id="member1-1" class="row">
	<div class="col-sm-4" style="padding:0px;height:auto;border:solid 1px #ddd;background:#fff">
		<img src="img/yama_fbicon.jpg" width="140" height="140" align="left">
		<h3>
		<?php
		foreach ($driver as $key => $user){
				echo $user['User']['username']."<br />";
				echo $user['User']['address']."<br />";

			}
		?>
		</h3>
		<a target="_blank" href="https://www.facebook.com/akihiro.yamamoto.94617" id="fb_link" ><img width="120" height="30" alt="facebook" src="img/btn_fb.gif" style="margin:6px;"></a>
	</div>
</div>
<div id="member1-2" class="row">
	<div class="col-sm-4" style="padding:0px;height:auto;border:solid 1px #ddd;background:#000">
		<font color="#fff">
			<?php 
			foreach ($driver as $key => $driver){
				echo "性別：".$driver['User']['gender']."<br />";
				echo "所属：".$driver['User']['faculty']."所属，".$driver['User']['grade']."<br />";
				echo "趣味：".$driver['User']['hobby']."<br />";
				echo "部活、サークル：".$driver['User']['club']."<br />";
				echo "出身地：".$driver['User']['from']."<br />";
				echo "好きな○○：".$driver['User']['subculture']."<br />";
				echo "最大乗車可能人数：".$driver['User']['capacity']."人<br />";

			}
			?>
		</font><br>
		
	</div>
</div>