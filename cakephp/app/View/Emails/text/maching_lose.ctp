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
 * @package       app.View.Emails.text
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
以下の案件のマッチングに失敗しました...

-----
日時：<?php echo $msg['Post']['encount'];?>　に
<?php echo $msg['Start']['name']."〜".$msg['Goal']['name']; ?>　まで
<?php 
if($msg['Post']['dpflag'] == 1){
	echo $msg['User']['username']."さんを乗せていく。";
}else{
	echo $msg['User']['username']."さんに乗せてもらう。"; 
}
?><br />
-----

今回は他のユーザーがマッチングしました。
落ち込まないで別の案件を探して楽しく移動しましょう！