<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-20
 * Time: 18:42
 */
?>

<!-----HEADER STAR----->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">首页</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="../list.php">文章列表</a></li>
                <li><a href="../hexo.php">hexo管理</a></li>
                <li><a href="../list.php?t=recycles">回收站</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">个人中心 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../new.php">新建文章</a></li>
                        <li><a href="#">退出登陆</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-----HEADER END----->
