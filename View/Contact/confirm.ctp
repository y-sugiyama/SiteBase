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
<br />
<?php

 echo $this->Form->postLink('再編集',['action'=>'contact']); 
 
 ?>
