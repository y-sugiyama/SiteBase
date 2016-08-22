<?php 
var_dump($this->request->data);
?>
<dl>
    
<?php foreach ($this->request->data['Contact'] as $name => $val): ?>
    <dt><?php echo h($name); ?></dt>
    <dd><?php echo h($val); ?></dd>
<?php endforeach; ?>
</dl>
 
<?php
echo $this->Form->create('Contact');
 
foreach ($this->request->data['Contact'] as $name => $val) {
    echo $this->Form->hidden($name, array('value' => $val));
}
 
?>
 <button class="btn btn-lg btn-primary btn-block" type="submit" name= "confirm" value="revise"><?php echo '修正する'; ?></button>
 
 <button class="btn btn-lg btn-primary btn-block" type="submit" name= "confirm" value="send"><?php echo '送信する'; ?></button>
 
<?php
 
echo $this->Form->end();

?>