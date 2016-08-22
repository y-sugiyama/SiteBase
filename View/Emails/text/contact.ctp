<?php
/**
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
<!--自分が設定したメールアドレスへ送信するメッセージの内容-->

Sitebase問い合わせフォームへ以下の内容が送信されました｡

<!--問い合わせフォームタイトル-->
お問い合わせ:
<?php echo $subject; ?>

<!--問い合わせされた方の名前-->
名前:
<?php echo $name; ?>

<!--問い合わせされた方のメールアドレス-->
メールアドレス:
<?php echo $email; ?>
 
<!--問い合わせされた内容-->
本文:
<?php echo $body; 