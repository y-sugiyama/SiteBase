<?php
$this->assign('title', 'お問い合せ');
?>

<?php
echo $this->Form->create('Contact');

echo $this->Form->input('name', array(
    'type' => 'text',
    'label' => 'お名前',
    'maxlength' => 255,
    'class' => 'form-control',
        )
);

echo $this->Form->input('email', array(
    'type' => 'email',
    'label' => 'メールアドレス',
    'maxlength' => 255,
    'class' => 'form-control',
        )
);


?>

<div class="form-group <?php
if ($this->Form->isFieldError('subject')) {
    echo 'has-error';
}
?>">
     <?php
         echo $this->Form->input('subject', [
             'type' => 'text',
             'label' => '題名',
             'maxlength' => 255,
             'class' => 'form-control',
             'placeholder' => '題名'
         ]);
         ?></div>

<div class="form-group <?php
if ($this->Form->isFieldError('body')) {
    echo 'has-error';
}
?>">
     <?php
         echo $this->Form->input('body', [
             'type' => 'textarea',
             'label' => 'お問い合わせ内容',
             'maxlength' => 3000,
             'class' => 'form-control',
             'placeholder' => 'お問い合せ内容'
         ]);
         ?></div>

<!--
<button class="btn btn-lg btn-primary btn-block" type="submit" name= "confirm" value="confirm"><?php echo '確認する'; ?></button>-->


<?php
echo $this->Form->end('submit',[
     'type' => 'submit',
    'value' =>'confirm',
]
        );
?>