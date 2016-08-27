<nav class="navbar navbar-default">

    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">SiteBase</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">ホーム </a></li>
                <li><a href="/pages/p1">このサイトについて</a></li>
                <li><a href="/pages/p2">アクセス</a></li>
                <li><?php echo $this->Html->link('お知らせ', array('controller'=>'pages','action' => 'news')); ?></li>
                <li><?php echo $this->Html->link('お問い合せ', array('controller'=>'contact','action' => 'contact')); ?></li>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                <li><?php echo $this->Html->link('ログイン', array('controller'=>'users','action' => 'login')); ?></li>
               
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>