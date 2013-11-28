<!-- File: /app/View/Posts/index.ctp -->

<h1>予定一覧</h1>
<div class="container">
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
                    .'<p>'.$value['Post']['start_id'].' 〜 '.$value['Post']['goal_id'].'<br>'
                    .$value['Post']['encount'].'に待ち合わせ</p></a>';
                //echo $this->debug($value['Venue']['venue'], log);
            }elseif($value['Post']['dpflag'] == 1){
                echo '<a class="btn btn-success" role="button" href="/~offside_now/yama/cakephp/posts/view/'.$value['Post']['id'].'" style="display:block">'.'<h2>乗りたい！</h2><br>'
                    .'<p>'.$value['Post']['start_id'].' 〜 '.$value['Post']['goal_id'].'<br>'
                    .$value['Post']['encount'].'に待ち合わせ</p></a>';
            }
            echo '</div>';
            $i ++;
        }
        echo '</div>';
    }
?>
</div>
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