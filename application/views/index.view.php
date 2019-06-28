<?php
/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/6/26
 * Time: 9:48
 */

include($this->view_path('public/header_start'));
?>

<?php
include($this->view_path('public/header_end'));
?>

<body>
<div class="flex-center position-ref full-height">
    <?php
    include($this->view_path('public/navbar'));
    ?>
    <div class="content">
        <div class="title m-b-md">
            PHP Hexo
        </div>

        <div class="links">
            <a href="<?php echo url('#?home.status') ?>">status</a>
            <a href="<?php echo url('#?home.new') ?>">新建文章</a>
            <a href="<?php echo url('#?home.list') ?>">文章列表</a>
            <a href="https://blog.laravel.com">回收站</a>
            <a href="<?php echo url('#?home.setting') ?>">setting</a>
            <a href="https://github.com/linfree/">GitHub</a>
        </div>
    </div>

</div>
</body>
<?php
include($this->view_path('public/footer'));
?>
</html>