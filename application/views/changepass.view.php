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
            Pass
        </div>
        <form method="post" class="layui-form" action="<?php echo url("?#login.changePassAjax") ?>">
            <input type="text" required="required" placeholder="用户名" name="user"></input>
            <input type="password" required="required" placeholder="原密码" name="pass"></input>
            <input type="password" required="required" id="L_repass" required lay-verify="new_pass" autocomplete="off"  placeholder="新密码" name="new_pass"></input>
            <input type="password"  required lay-verify="re_new_pass" autocomplete="off"  placeholder="重复新密码" name="re_new_pass"></input>
            <div style="float: left; margin: 5px;"><span style="color: #ff555f">提示：</span>忘记原始密码时，请到配置文件中恢复</div>

            <button class="but" lay-submit=""  lay-filter="sub" type="button">修改密码</button>
        </form>
    </div>
</div>

</body>

<script>



    $(document).ready(function () {
        var form = layui.form;

        form.verify({
            new_pass: [/^(.+){6,12}$/, '密码必须6到12位'] ,
            re_new_pass: function(value){
                var repassvalue = $('#L_repass').val();
                if(value != repassvalue){
                    return '两次输入的密码不一致!';
                }
            }
        });

        form.on('submit(sub)', function (data) {

            loading();
            console.log(data);
            $.ajax({
                url: "<?php echo url('?#login.changePassAjax') ?>",
                data: data.field,
                type: "POST",
                success:function (result) {
                    result = JSON.parse(result)
                    console.log(result);
                    if (result['code']==1){
                        close_loading();
                        window.location="<?php echo url('?#login.login') ?>"
                    }else {
                        close_loading();
                        layer.msg(result.tip);

                    }
                }
            })

        });
    });

</script>
<?php
include($this->view_path('public/footer'));
?>

</html>
