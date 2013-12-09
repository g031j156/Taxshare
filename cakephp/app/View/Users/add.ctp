


<!-- File: /app/View/Posts/login.ctp -->

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
    <div align="center">
    	<a href="https://www.facebook.com/taxshare" target="blank">
            <img src="../img/taxshare/title_icon.png" width="350" height="95" alt="home">
        </a>

    	<?php echo $this->Form->create('Signature'); ?>
	    <fieldset align="center">
	        <legend>新規登録</legend>
	    	<?php 
	    		
	      		echo $this->Form->input('username', array('label'=> "学内アドレス", 'after'=> '@s.iwate-pu.ac.jp'));
	        	echo $this->Form->input('password', array('label'=> "パスワード"));
	        	echo $this->Form->submit('登録する', array('id'=>"submit"));
	        ?>
	    </fieldset>
		<?php echo $this->Form->end(); ?>
	</div>


    <script>
    $(function(){
    	$('#submit').on('click',function(){
    		var address = $('#SignatureUsername').val();
    		alert(address + "@s.iwate-pu.ac.jp に\n「仮登録完了のお知らせ」のメールを送信しました!");	
    	})
    	

        setTimeout(function(){
            $('#flashMessage').fadeOut("slow");
        }, 800);
    });
    </script>
</body>
</html>