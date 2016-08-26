<?php
$this->assign('title', 'お問い合せ');
?>

<?php
echo $this->Form->create('Contact');
?>
<div class="form-group <?php
if ($this->Form->isFieldError('name')) {
    echo 'has-error';
}
?>">
     <?php
         echo $this->Form->input('name', [
             'type' => 'text',
             'label' => 'お名前',
             'maxlength' => 255,
             'class' => 'form-control',
             'placeholder' => '山田 太郎'
         ]);
         ?></div>


<div class="form-group <?php
         if ($this->Form->isFieldError('email')) {
             echo 'has-error';
         }
         ?>">
     <?php
         echo $this->Form->input('email', [
             'type' => 'email',
             'label' => 'メールアドレス',
             'maxlength' => 255,
             'class' => 'form-control',
             'placeholder' => 'aaa@example.com'
         ]);
         ?></div>


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
             
<button class="btn btn-lg btn-primary" type="submit">送信</button>

<?php echo $this->Form->end(); ?>

<?php
/*
$options = array(
    'label' => '送信',
    'div' => array(
        'class' => 'btn btn-primary',
        
    )
);

echo $this->Form->end($options,[
    'div' => 'false'
]);
*/