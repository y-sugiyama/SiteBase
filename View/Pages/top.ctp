<?php
$this->assign('title', 'Sitebase Top');
?>

<!-- Jumbotron -->
<?php
$this->start('topheader');
?>
<div class="topimage">
    <div class="container">
        <div class="squere">
            <h1>Sitebase Top</h1>
            <p class="lead">コーポレートサイトの基盤となるプロジェクトです</p>
        </div>
    </div>
</div>

<?php
$this->end();
?>
<!-- Example row of columns -->
<div class="row">
    <div class="col-lg-4" >
        <span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span>
        <h2>全体</h2>
        <p> 
            フレームワークは CakePHP2.8.6 を使用しています。
            CakePHPのプロジェクトはComposer を使って作成しています。
            DBの管理にマイグレーションを使用しています。
            フロントエンド、バックエンド共に CSS フレームワークに Bootstrap3を使用しています。

        </p>

    </div>
    <div class="col-lg-4">
        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        <h2>フロントエンド</h2>
        <p>
            メニューを表示し､各ページへ遷移できます｡
            お知らせ一覧を表示しています。
            お問い合わせフォームを表示し、管理者に内容をメールできます。
            お問い合わせフォーム入力後に送信内容の確認画面を表示します。
        </p>
    </div>
    <div class="col-lg-4">
        <span class="glyphicon glyphicon-tower" aria-hidden="true"></span>
        <h2>バックエンド</h2>
        <p>
            左サイドにメニューを設けています｡
            ユーザー名、パスワードでログイン可能が可能です。
            パスワードは暗号化しています｡
            ユーザーの一覧表示、詳細表示、追加、変更、削除を可能です。
            ユーザーには管理者と一般ユーザーの役割を持たせています。
            管理者のみがユーザー管理を可能です。
            お知らせの一覧表示、詳細表示、追加、変更、削除ができます。
            お知らせの管理は管理者、一般ユーザ共に可能です。
        </p>
    </div>
</div>


<!--
<div class="panel panel-info" id="news">
   Default panel contents 
  <div class="panel-heading">お知らせ</div>

   Table 
  <table class="table">
      <tr>
          <th>タイトル</th>
          <th>内容</th>
          <th>作成日</th>
      </tr>
      <tr>
<?php // foreach ($posts as $post): ?>
          
      <td> <?php // echo h($post['Post']['title']);      ?> 
               </td>          
      <td><?php // echo h($post['Post']['body'])      ?></td>
      <td><?php // echo h($post['Post']['created'])      ?></td>
      </tr>
<?php // endforeach; ?>
  </table>
</div>-->
<div class="panel-group" id="accordion">
    <h3>お知らせ</h3>
    <?php foreach ($posts as $post): ?>
        <!--アコーディオンブロック-->
        <!--アコーディオン要素-->
        <div class="panel panel-info" id="news">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <?php echo h($post['Post']['title']); ?> 
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php echo h($post['Post']['body']) ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!--/アコーディオン要素-->
<!--アコーディオン要素-->

<!-- Site footer -->
<footer class="footer">
    <p>&copy; 2016 Yuriko Sugiyama.</p>
</footer>
