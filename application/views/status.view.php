<?php
/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/6/26
 * Time: 23:30
 */

include($this->view_path('public/header_start'));
?>
<!--index.css-->
<link rel="stylesheet" href="assets/css/status.css">

<link rel="stylesheet" href="assets/css/heart.css">

<style>
    .left-text {
        padding-top: 1em;
    }
</style>
<?php
include($this->view_path('public/header_end'));
?>

<body>
<div class="flex-center position-ref full-height-2">
    <?php
    include($this->view_path('public/navbar'));
    ?>
    <div class="content " style="width: 60%">
        <div class="title-2 m-b-md">
            平台状态
        </div>
    </div>


</div>
<div class="box  content " style="width: 60%;margin: 0 20%">
    <h3 class="left-text" style="font-weight:400">
        # 服务状态
    </h3>
    <ul class="s1 left-text ">
        <li>
            <div style="float: left ;">服务【已启动】</div>
            <div class="heart" style="float: left"></div>

        </li>
        <li style="clear: both;">监听IP：0.0.0.0</li>
        <li>监听端口：4000</li>
        <li>进程PID：11222</li>
        <li>
            <button class="button">结束服务</button>
        </li>
    </ul>
    <h3 class="left-text" style="font-weight:400">
        # HEXO信息
    </h3>
    <ul class="s1 left-text ">
        <li>Friday</li>
        <li>Monday</li>
        <li>Saturday</li>
        <li>Wednesday</li>
    </ul>
    <h3 class="left-text" style="font-weight:400">
        # Git版本
    </h3>
    <ul class="s1 left-text ">
        <li>Friday</li>
        <li>Monday</li>
        <li>Saturday</li>
        <li>Wednesday</li>
    </ul>
</div>
</body>
<?php
include($this->view_path('public/footer'));
?>

</html>
