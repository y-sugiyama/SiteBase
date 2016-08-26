<?php 
//var_dump($this->request->data);
?>


<dl>
   
<?php foreach ($contact as $name => $val): ?>
    <dt><?php echo h($name); ?></dt>
    <dd><?php echo h($val); ?></dd>
<?php endforeach; ?>
</dl>
 

 <!--<button class="btn btn-lg btn-primary" type="submit">送信</button>-->

<?php // echo $this->Form->end(); ?>


 <?php
$options = array(
        'class' => 'btn btn-default'
        
    );


 echo $this->Html->link('再編集',[
     'action'=>'contact'
     ],$options
         ); 
 
?>
   &nbsp;  
<?php

 echo $this->Form->postLink('送信', null,[
      'class' => 'btn btn-primary'
 ]
         ); 
 



 
 


