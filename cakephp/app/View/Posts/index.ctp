<!-- File: /app/View/Posts/index.ctp -->

<h3><span class="text-primary">-----予定検索-----</span></h3>
<!-- すべて表示ボタン-->
<a class="btn btn-primary" role="button">すべて</a>
<!-- 絞り込むボタン　どういう条件で絞り込むか不明．　ポップアップ形式が望ましい？-->
<a class="btn btn-primary" role="button">絞り込む</a>

<br><br><br>

<h1><span class="text-primary">予定一覧</span></h1>
<!-- <div class="container"> -->
<?php
    if($data){
        $i = 0;
        echo '<div id="member" class="row">';
        foreach ($posts as $key => $value) { 
            if($i == 4){
                $i = 0;
                echo '</div>';
                echo '<div id="member" class="row">';
            }
            echo '<div class="col-xs-3">';
            if($value['Post']['dpflag'] == 0){
                echo '<a class="btn btn-primary" role="button" href="/~offside_now/yama/cakephp/posts/view/'.$value['Post']['id'].'" style="display:block">'.'<h2>乗せるよ！</h2><br>'
                    .'<p>'.$value['Start']['name'].' 〜 '.$value['Goal']['name'].'まで<br>'
                    .$value['Post']['encount'].'に待ち合わせ</p></a>';
                //echo $this->debug($value['Venue']['venue'], log);
            }elseif($value['Post']['dpflag'] == 1){
                echo '<a class="btn btn-success" role="button" href="/~offside_now/yama/cakephp/posts/view/'.$value['Post']['id'].'" style="display:block">'.'<h2>乗りたい！</h2><br>'
                    .'<p>'.$value['Start']['name'].' 〜 '.$value['Goal']['name'].'まで<br>'
                    .$value['Post']['encount'].'に待ち合わせ</p></a>';
            }
            echo '</div>';
            $i ++;
        }
        echo '</div>';
    }
?>

<!-- <table>						
    <tr>
        <th>タイトル</th>			
        <th>出発地</th>
        <th>目的地</th>
        <th>出発日時</th>
        <th>締切日時</th>	
    </tr>

    

    <?php foreach ($posts as $post): ?>									
    <tr>
        <td><?php 
        		if($post['Post']['dpflag'] == 0){		
        			echo $this->Html->link("乗せるよ！",				
					array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); 	/* dpflag=0 → driver */
				}elseif($post['Post']['dpflag'] == 1){
					echo $this->Html->link("乗りたい！",
					array('controller' => 'posts', 'action' => 'view', $post['Post']['id']));	/* dpflag=1 → passenger */
				} 
			?>
		</td>								
        <td>
            <?php echo $post['Venue']['venue']."から"; ?>
        </td>
        <td>
        	<?php echo $post['Venue']['venue']."まで"; ?>
        </td>
            <!-- <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); /* 編集ボタン */ ?>	
            <?php echo $this->Form->postLink(															//削除ボタン
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?'));													//確認メッセージ
            ?>
           -->
        																	
<!--         <td><?php echo $post['Post']['encount']; ?></td>						
        <td><?php echo $post['Post']['limit']; ?></td>					
    </tr>
    <?php endforeach; ?>												
    <?php unset($post); ?>
</table>	
  -->