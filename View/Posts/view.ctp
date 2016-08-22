<div class="posts view">
<h2><?php echo __('お知らせ詳細'); ?></h2>

  <table class="table table-bordered">  
    <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('タイトル'); ?></th>
        <th><?php echo __('お知らせ内容'); ?></th>
    </tr>
    <tr>

        <td><?php echo h($post['Post']['id']); ?></td>
        <td><?php echo h($post['Post']['title']); ?></td>
        <td><?php echo h($post['Post']['body']); ?></td>


    </tr>
  </table>
</div>

