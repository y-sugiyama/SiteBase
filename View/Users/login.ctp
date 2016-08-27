





<div class="row" id="contact">
    <div class="col-md-6 col-md-offset-3"> 
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading" id="login"><h4><?php echo 'ログイン画面'; ?></h4></div>
            <div class="panel-body">


                <?php echo $this->Form->create('User', ['novalidate' => 'novalidate']) ?>
                <?php
                if ($this->Form->isFieldError('username')) {
                    echo 'has-error';
                }
                ?>
                <div class="form-group <?php
                         if ($this->Form->isFieldError('username')) {
                             echo 'has-error';
                         }
                         ?>">
                         <?php
                         echo $this->Form->input('username', [
                             'class' => 'form-control',
                             'placeholder' => 'Username',
                             //エラーメッセージ出力において
                             'error' => [
                                 //HTML が自動的にエスケープされる
                                 'attributes' => ['escape' => true],
                             ]
                         ]);
                         ?>
                </div>

                <div class="form-group <?php
                         if ($this->Form->isFieldError('password')) {
                             echo 'has-error';
                         }
                         ?>">
<?php
echo $this->Form->input('password', [
    'class' => 'form-control',
    'placeholder' => 'Password'
]);
?>
                </div>

                <button class="btn btn-lg btn-primary" type="submit"><?php echo 'ログイン'; ?></button>
<?php echo $this->Form->end(); ?> 

            </div>
        </div>
    </div>