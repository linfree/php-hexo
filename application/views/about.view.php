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
            About
        </div>

        <div class="links left-text">

            <p>
                <b> php-hexo </b>是一个php写的hexo管理界面，可以在web界面编辑修改blog
            </p>
            <p>
                <b>主要用途：</b>
            </p>
            <p>
                1. 本地搭建
            </p>
            <p>
                可以在本地的web界面编辑、修改、生成、预览hexo博客。
                比直接在命令行操作，然后在本地编辑器里编辑方便。
            </p>
            <p>

                2. 搭建在vps上
            </p>
            <p>
                可以在不同设备上，不同的地方都很方便的管理hexo博客。
            </p>
            <p>
                至于为什么不直接在vps上建一个博客系统呢？
            </p>
            <p>
                1.vps可能经常换，迁移麻烦。
            </p>
            <p>
                2.是博客放到GitHub上比放在自己的服务器上稳定，安全。
            </p>

        </div>
    </div>
</div>
</body>
<?php
include($this->view_path('public/footer'));
?>
</html>