
<div class="password">

    <div class="container">

        <!-- content -->
        <div class="row" style="padding:5px 0 0 0">
            <!-- left -->
            <div class="col-md-3">   

                <?php echo $this->element('menu_admin'); ?>

            </div>

            <!-- center -->
            <div class="col-md-9" style="background-color:white">


<h2>パスワード変更</h2>

<?php echo $this->Form->create('User', ['novalidate' => 'novalidate']) ?>


<div class="form-group <?php if($this->Form->isFieldError('password_current')) { echo 'has-error'; } ?>">
    <?php echo $this->Form->input('password_current',[
        'label' => '現在のパスワード',
        'type' => 'password',
        'class' => 'form-control'
    ]); ?>
</div>

<div class="form-group <?php if($this->Form->isFieldError('password')) { echo 'has-error'; } ?>">
    <?php echo $this->Form->input('password',[
        'label' => '新パスワード',
        'type' => 'password',
        'class' => 'form-control'
    ]); ?>
</div>

<div class="form-group <?php if($this->Form->isFieldError('password_confirm')) { echo 'has-error'; } ?>">
    <?php echo $this->Form->input('password_confirm',[
        'label' => 'パスワード（確認）',
        'type' => 'password',
        'class' => 'form-control',
    ]); ?>
</div>

<?= $this->Form->hidden('id'); ?>


<button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo '更新'; ?></button>
<?= $this->Form->end(); ?>

            </div>
        </div>
    </div>
</div>
