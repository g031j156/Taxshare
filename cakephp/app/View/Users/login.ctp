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
        //echo $this->Html->meta('icon');

        echo $this->Html->css('taxshare.generic');
        echo $this->Html->css('bootstrap');
        echo $this->Html->script('bootstrap');
        
    ?>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
   
</head>

<body>
    <div class="container">
        <a href="https://www.facebook.com/taxshare" target="blank">
            <img src="../img/taxshare/title_icon.png" width="350" height="95" alt="home">
        </a>
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User'); ?>
            <?php
                // echo $this->Form->input('username', array('type' => 'text', 'label' => '学内アドレス', 'placeholder' => '学内アドレス', 'after' => '@s.iwate-pu.ac.jp', 'div'=> false));
                // echo $this->Form->input("password",array("type" => "text",'label' => false, 'div'=> false));
                // echo $this->Form->end('ログイン');

            ?>

            <?php 
                echo $this->Form->input('username', array('placeholder'=> "学内アドレス", 'after' => '@s.iwate-pu.ac.jp', 'div' => false, 'label' => false));
                echo $this->Form->input('password', array('placeholder'=> "パスワード", 'div' => false, 'label' => false));
                echo $this->Form->end(__('ログイン'));
            ?>
            </fieldset> 

        <?php  ?>

        <a class="btn btn-primary" href="add">新規登録</a>
        <div class="jumbotron">
            <h1>What is taxshare</h1>
            <p>説明文...</p>
            <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
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