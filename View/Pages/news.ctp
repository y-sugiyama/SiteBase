<?php
$this->assign('title', 'Sitebase お知らせ詳細');
?>
<?php
$this->start('topheader');
?>
<div class="topbackground1">
    <div class="container">
        <h1>Sitebase お知らせ</h1>
        <p class="lead">  </div>
</div>

<?php
$this->end();
?>

<!-- Example row of columns -->



<div class="row">
    <?php foreach ($posts as $post): ?>
        <div class="col-sm-6 col-md-4" id="news">
            <div class="thumbnail">
                <!--<div class="caption">-->
                    <!--<span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span>-->
                <h6> <?php echo h($post['Post']['created']); ?></h6>
                <h3> <?php echo h($post['Post']['title']); ?> </h3>
                <p> <?php echo h($post['Post']['body']) ?></p>

                <!--</div>-->
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!--<div class="pagination">-->   
<nav aria-label="pagination">
    <ul class="pagination pagination-lg"> 

        <?php
        echo $this->Paginator->prev(
                '前へ', //タイトル
                [                      //通常時のタイトルのオプション
            'tag' => 'li', //タグをラッピングするタグ
//                    'class' => 'prev',
                ], null, //無効時のタイトル
                [                      //無効時のオプション
            'tag' => 'li',
            'class' => 'disabled',
//                    'class' => 'previous disabled',
            'disabledTag' => 'a',
                ]
        );
        ?>

        <?php
        echo $this->Paginator->numbers([
            //生成されたリンクの間に置くテキスト
            'separator' => '',
            //現在のページ番号として使うタグ
            'currentTag' => 'a',
            //'currentClass' => 'active',
            //タグをラッピングするのに使うタグ
            'tag' => 'li',
            'first' => 1,
            //省略を表すテキスト
            'ellipsis' => '<li class="disabled"><a>...</a></li>'
        ]);
        ?>

        <?php
        echo $this->Paginator->next(
                //タイトル
                '次へ',
                //通常時のタイトルのオプション
                [
            //タグをラッピングするタグ
            'tag' => 'li',
            'class' => 'next'
                ],
                //無効時のタイトル
                null,
                //無効時のオプション
                [
            'tag' => 'li',
            'class' => 'disabled',
            'disabledTag' => 'a',
                ]
        );
        ?>
    </ul>
</nav>
<!--</div>-->