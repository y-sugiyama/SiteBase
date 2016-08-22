

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
                <h2><?php echo 'お知らせ一覧'; ?></h2>

                <?php if ($login_user['role'] === 'admin') : ?>
                    <p><button class="btn btn-default" role="button"><?php echo $this->Html->link('新規追加', array('controller' => 'posts', 'action' => 'add')); ?></button></p>
                <?php endif; ?>

                <?php echo $this->fetch('content'); ?>
                <table class="table table-striped">
                    <tr>
                        <th>タイトル</th>

                        <th>作成日</th>
                    </tr>
                    <?php foreach ($posts as $post): ?>

                        <tr>

                            <td><?php echo $this->Html->link(h($post['Post']['title']), array('action' => 'view', $post['Post']['id'])); ?></td>
                            <td><?php echo h($post['Post']['body']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php if ($login_user['role'] === 'admin') : ?>
                                    <button type="button" class="btn btn-default"><?php echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id'])); ?></button>
                                    <button type="button" class="btn btn-danger"><?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $post['Post']['id']), array('confirm' => '本当に削除してよろしいですか?', $post['Post']['id'])); ?></button>
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




