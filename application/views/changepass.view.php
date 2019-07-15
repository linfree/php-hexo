<?php
/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/6/26
 * Time: 9:48
 */


include($this->view_path('public/header_start'));
?>
<link rel="stylesheet" type="text/css" href="assets/css/login.css"/>
<?php
include($this->view_path('public/header_end'));
?>

<body>

<div class="flex-center position-ref full-height">
    <div id="login" class="content">
        <div class="title m-b-md">
            Login
        </div>
        <form method="post" action="<?php echo url("?#login.changePassAjax") ?>">
            <input type="text" required="required" placeholder="用户名" name="user"></input>
            <input type="password" required="required" placeholder="原密码" name="pass"></input>
            <input type="password" required="required" placeholder="新密码" name="new_pass"></input>
            <input type="password" required="required" placeholder="重复新密码" name="new_pass2"></input>
            <button class="but" type="submit">登录</button>
        </form>
    </div>
</div>

</body>
<?php
include($this->view_path('public/footer'));
?>

</html>