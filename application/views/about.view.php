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
<!--index.css-->
<link rel="stylesheet" href="assets/css/status.css">
<style>
    .left-text {
        padding-top: 1em;
    }
</style>
<body>

<div class="flex-center position-ref full-height-2">
    <?php
    include($this->view_path('public/navbar'));
    ?>
    <div class="content " style="width: 60%">
        <div class="title-2 m-b-md">
            About
        </div>
    </div>


</div>
<div class="box  content " style="width: 60%;margin: 0 20%">
    <h3 class="left-text" style="font-weight:400">
        # 关于项目
    </h3>
    <ul class="s1 left-text ">
        <li>
            php-hexo 是一个php写的hexo管理界面，可以在web界面编辑修改blog
        </li>

    </ul>


    <h3 class="left-text" style="font-weight:400">
        # 主要用途
    </h3>
    <ul class="s1 left-text ">
        <li>1. 本地搭建</li>
        <li>可以在本地的web界面编辑、修改、生成、预览hexo博客。 比直接在命令行操作，然后在本地编辑器里编辑方便。</li>
        <li>2. 搭建在vps上</li>
        <li>可以在不同设备上，不同的地方都很方便的管理hexo博客</li>
    </ul>

    <h3 class="left-text" style="font-weight:400">
        # 项目地址
    </h3>
    <ul class="s1 left-text ">
        <li>Github：<a href="https://github.com/linfree/php-hexo">https://github.com/linfree/php-hexo</a></li>
        <li>码云：<a href="https://github.com/linfree/php-hexo">https://github.com/linfree/php-hexo</a></li>
        <li>个人主页：<a href="https://fbi.st">https://fbi.st</a></li>
    </ul>
</div>




</body>
<?php
include($this->view_path('public/footer'));
?>
</html>


