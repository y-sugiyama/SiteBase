<?php 
//var_dump($this->request->data);
?>
<dl>
    
<?php foreach ($contact as $name => $val): ?>
    <dt><?php echo h($name); ?></dt>
    <dd><?php echo h($val); ?></dd>
<?php endforeach; ?>
</dl>
 

  

 
<?php

 echo $this->Form->postLink('送信'); 
 
 ?>

再編集 contact/contactへもどる
もしsessionがあればrequest->dataにsetする
finished sessionを削除する