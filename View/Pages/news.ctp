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
