

<div class="users index">

    <div class="container">

        <!-- content -->
        <div class="row" style="padding:5px 0 0 0">
            <!-- left -->
            <div class="col-md-3">   

                <?php echo $this->element('menu_admin'); ?>

            </div>

            <!-- center -->
            <div class="col-md-9" style="background-color:white">
                <h2><?php echo 'ユーザ一覧'; ?></h2>

                <?php if ($login_user['role'] === 'admin') : ?>
                    <p><?php echo $this->Html->link('新規追加', array('controller' => 'users', 'action' => 'add'),['class' => 'btn btn-default']); ?></p>
                <?php endif; ?>

                <?php echo $this->fetch('content'); ?>
                <table class="table table-striped">
                    <tr>
                        <th>ユーザ名</th>
                        <th>権限</th>
                        <th>アクション</th>
                    </tr>
                    <?php foreach ($users as $user): ?>

                        <tr>

                            <td><?php echo $this->Html->link(h($user['User']['username']), array('action' => 'view', $user['User']['id'])); ?></td>
                            <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php if ($login_user['role'] === 'admin') : ?>

                                    <?php
                                    echo $this->Html->link('編集', array('action' => 'edit', $user['User']['id']), ['class' => 'btn btn-default']);
                                    ?>

                                    <?php
                                    echo $this->Form->postLink(__('削除'), ['action' => 'delete', $user['User']['id']], ['class' => 'btn btn-danger']);
                                    ?>
                                <?php endif; ?>

                                <?php if ($login_user['role'] === 'user') : ?>
                                    <?php echo '実行できるアクションはありません'; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>

            </div>

        </div>

    </div>
    <!-- ビューで表示したいものはここに配置します。 -->

</div>




