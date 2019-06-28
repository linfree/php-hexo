<?php
/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/6/26
 * Time: 17:29
 */


include($this->view_path('public/header_start'));
?>
<!--index.css-->
<link rel="stylesheet" href="assets/css/status.css">
<script language="JavaScript" type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.7/jquery.min.js"></script>
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
            HEXO配置
        </div>
    </div>
</div>
<div class=" content " style="width: 60%;margin: 0 20%">


    <form class="layui-form" action="">

        <!--------------------------------网站配置------------------------>
        <fieldset class="layui-elem-field layui-field-title " style="margin: 30px 0;">
            <legend>网站配置</legend>
        </fieldset>

        <div class="layui-form-item">
            <label class="layui-form-label">网站标题</label>
            <div class="layui-input-block">
                <input type="text" name="sitename" value="layuiAdmin" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">网站副标题 </label>
            <div class="layui-input-block">
                <input type="text" name="domain" lay-verify="url" value="http://www.layui.com" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">作者名称 </label>
            <div class="layui-input-block">
                <input type="text" name="domain" lay-verify="url" value="http://www.layui.com" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">网站描述</label>
            <div class="layui-input-block">
                <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label">网站地址</label>
            <div class="layui-input-block">
                <input type="text" name="sitename" value="http://fbi.st" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">根目录 </label>
            <div class="layui-input-block">
                <input type="text" name="domain" lay-verify="url" value="/" class="layui-input">
            </div>
        </div>
        <!--提示-->
        <blockquote class="layui-elem-quote layui-text">
            如果您的网站存放在子目录中，例如 http://yoursite.com/blog，则请将您的 url 设为 http://yoursite.com/blog 并把 root 设为 /blog/。
        </blockquote>
        <!--------------------------------git配置------------------------>
        <fieldset class="layui-elem-field layui-field-title " style="margin: 30px 0;">
            <legend>GIT配置</legend>
        </fieldset>


        <div class="layui-form-item">
            <label class="layui-form-label">输入框</label>
            <div class="layui-input-block">
                <input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码框</label>
            <div class="layui-input-inline">
                <input type="password" name="password" required lay-verify="required" placeholder="请输入密码"
                       autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">辅助文字</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">选择框</label>
            <div class="layui-input-block">
                <select name="city" lay-verify="required">
                    <option value=""></option>
                    <option value="0">北京</option>
                    <option value="1">上海</option>
                    <option value="2">广州</option>
                    <option value="3">深圳</option>
                    <option value="4">杭州</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">复选框</label>
            <div class="layui-input-block">
                <input type="checkbox" name="like[write]" title="写作">
                <input type="checkbox" name="like[read]" title="阅读" checked>
                <input type="checkbox" name="like[dai]" title="发呆">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开关</label>
            <div class="layui-input-block">
                <input type="checkbox" name="switch" lay-skin="switch">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">单选框</label>
            <div class="layui-input-block">
                <input type="radio" name="sex" value="男" title="男">
                <input type="radio" name="sex" value="女" title="女" checked>
            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label">缓存时间</label>
            <div class="layui-input-inline" style="width: 80px;">
                <input type="text" name="cache" lay-verify="number" value="0" class="layui-input">
            </div>
            <div class="layui-input-inline layui-input-company">分钟</div>
            <div class="layui-form-mid layui-word-aux">本地开发一般推荐设置为 0，线上环境建议设置为 10。</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">最大文件上传</label>
            <div class="layui-input-inline" style="width: 80px;">
                <input type="text" name="cache" lay-verify="number" value="2048" class="layui-input">
            </div>
            <div class="layui-input-inline layui-input-company">KB</div>
            <div class="layui-form-mid layui-word-aux">提示：1 M = 1024 KB</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">上传文件类型</label>
            <div class="layui-input-block">
                <input type="text" name="cache" value="png|gif|jpg|jpeg|zip|rar" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">首页标题</label>
            <div class="layui-input-block">
                <textarea name="title" class="layui-textarea">layuiAdmin 通用后台管理模板系统</textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">META关键词</label>
            <div class="layui-input-block">
                <textarea name="keywords" class="layui-textarea" placeholder="多个关键词用英文状态 , 号分割"></textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">META描述</label>
            <div class="layui-input-block">
                <textarea name="descript" class="layui-textarea">layuiAdmin 是 layui 官方出品的通用型后台模板解决方案，提供了单页版和 iframe 版两种开发模式。layuiAdmin 是目前非常流行的后台模板框架，广泛用于各类管理平台。</textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">版权信息</label>
            <div class="layui-input-block">
                <textarea name="copyright" class="layui-textarea">© 2018 layui.com MIT license</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>

    </form>

</div>
</body>
<?php
include($this->view_path('public/footer'));
?>

</html>
