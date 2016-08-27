

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


                <p><button class="btn btn-default" role="button"><?php echo $this->Html->link('新規追加', array('controller' => 'posts', 'action' => 'add')); ?></button></p>


                <?php echo $this->fetch('content'); ?>
                <table class="table table-striped">
                    <tr>
                        <th>タイトル</th>
                        <th>内容</th>
                        <th>作成日</th>
                        <th>アクション</th>
                    </tr>
                    <?php foreach ($posts as $post): ?>

                        <tr>

                            <td><?php echo $this->Html->link(h($post['Post']['title']), ['action' => 'view', $post['Post']['id']]); ?></td>
                            <td><?php
                                echo $this->Text->truncate(h($post['Post']['body']), 10, [
                                    'ellipsis' => '...',
                                    'exact' => true,
                                    'html' => true
                                        ]);
                                
                                            
                                ?>&nbsp;</td>
                            <td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
                            <td class="actions">

                                <button type="button" class="btn btn-default"><?php echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id'])); ?></button>
                                <button type="button" class="btn btn-danger"><?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $post['Post']['id']), array('confirm' => '本当に削除してよろしいですか?', $post['Post']['id'])); ?></button>

                            </td>
                        </tr>
<?php endforeach; ?>

                </table>
            

            </div>

        </div>

    </div>
    <!-- ビューで表示したいものはここに配置します。 -->

</div>




