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
        <form method="post"  class="layui-form">
            <input type="text" class="layui-input" required="required" lay-verify="required"  placeholder="用户名" name="user"></input>
            <input type="password" class="layui-input" required="required"lay-verify="required"  placeholder="密码" name="pass"></input>
            <a href="<?php echo url('?#login.changePass') ?>" style="float: right; margin: 3px 5px;">修改密码</a>
            <button class="but"  lay-submit  lay-filter="sub" type="button">登录</button>
        </form>
    </div>
</div>

</body>
<?php
include($this->view_path('public/footer'));
?>

<script>
    $(document).ready(function () {
        var form = layui.form;

        form.on('submit(sub)', function (data) {

            loading();
            console.log(data);
            $.ajax({
                url: "<?php echo url('?#login.checkLogin') ?>",
                data: data.field,
                type: "POST",
                success:function (result) {
                    result = JSON.parse(result)
                    console.log(result);
                    if (result['code']==1){
                        close_loading();
                        window.location="<?php echo url('?#home.index') ?>"
                    }else {
                        close_loading();
                        layer.msg(result.tip);

                    }
                }
            })

        });
    });

</script>
</html>
