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
    .left-text-2 {
        text-align: left;
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


    <form class="layui-form" method="post" action="<?php echo url("hexoer.setting"); ?>">

        <!--------------------------------网站配置------------------------>
        <fieldset class="layui-elem-field layui-field-title " style="margin: 30px 0;">
            <legend>网站配置</legend>
        </fieldset>

        <div class="layui-form-item">
            <label class="layui-form-label">网站标题</label>
            <div class="layui-input-block">
                <input type="text" name="sitename" value="<?php echo $title; ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">网站副标题 </label>
            <div class="layui-input-block">
                <input type="text" name="subtitle" lay-verify="title" placeholder="请输入网站副标题"
                       value="<?php echo $subtitle; ?>" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">作者名称 </label>
            <div class="layui-input-block">
                <input type="text" name="author" lay-verify="title" value="<?php echo $author; ?>" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">网站关键字 </label>
            <div class="layui-input-block">
                <input type="text" name="keywords" lay-verify="title" placeholder="多个关键字用,分割"
                       value="<?php echo $keywords; ?>" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">网站描述</label>
            <div class="layui-input-block">
                <textarea name="description" placeholder="请输入网站描述" value="<?php echo $description; ?>"
                          class="layui-textarea"></textarea>
            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label">网站地址</label>
            <div class="layui-input-block">
                <input type="text" name="url" lay-verify="url" value="<?php echo $url; ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">根目录 </label>
            <div class="layui-input-block">
                <input type="text" name="root" lay-verify="title" value="<?php echo $root; ?>" class="layui-input">
            </div>
        </div>
        <!--提示-->
        <blockquote class="layui-elem-quote layui-text left-text-2">如果您的网站存放在子目录中，例如: <span style="color: #00c4ff">http://yoursite.com/blog</span>，则请将您的
            url 设为 <span style="color: #00c4ff">http://yoursite.com/blog</span> 并把 root 设为 <span style="color: #00c4ff">/blog/</span>。
        </blockquote>


        <!--------------------------------BLOG配置------------------------>
        <fieldset class="layui-elem-field layui-field-title " style="margin: 30px 0;">
            <legend>BLOG配置</legend>
        </fieldset>

        <div class="layui-form-item">
            <label class="layui-form-label">资源目录</label>
            <div class="layui-input-block">
                <input type="text" name="source_di" value="<?php echo $source_dir; ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">默认布局 </label>
            <div class="layui-input-block">
                <input type="text" name="default_layout" value="<?php echo $default_layout; ?>"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">每页博客数</label>
            <div class="layui-input-block">
                <input type="text" name="per_page" lay-verify="number" value="<?php echo $per_page; ?>"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">主题 </label>
            <div class="layui-input-block">
                <input type="text" name="theme" placeholder="请输入关键字" value="<?php echo $theme; ?>"
                       class="layui-input">
            </div>
        </div>


        <!--------------------------------git配置------------------------>
        <fieldset class="layui-elem-field layui-field-title " style="margin: 30px 0;">
            <legend>GIT配置</legend>
        </fieldset>

        <div class="layui-form-item">
            <label class="layui-form-label">仓库地址</label>
            <div class="layui-input-block">
                <input type="text" name="git_repo" lay-verify="url" placeholder="输入blog仓库地址"
                       value="<?php echo $deploy['repo']; ?>" autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">分支</label>
            <div class="layui-input-block">
                <input type="text" name="git_branch" placeholder="默认为：master分支"
                       value="<?php echo $deploy['branch']; ?>" autocomplete="off"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">提交信息</label>
            <div class="layui-input-block">
                <input type="text" name="git_message" placeholder="默认为：Site updated: {{ now('YYYY-MM-DD HH:mm:ss') }}"
                       value="<?php echo $deploy['message']; ?>" autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <!--提示-->
        <blockquote class="layui-elem-quote layui-text left-text-2">

            git仓库地址类似 <span style="color: #00c4ff"># <repository
                        url> https://github.com/linfree/linfree.github.io</span>
            <br>
            分支默认为：<span style="color: #00c4ff">master</span>
            <br>
            提交信息默认为：<span style="color: #00c4ff">Site updated: {{ now('YYYY-MM-DD HH:mm:ss') }}</span>

        </blockquote>
        <!--
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
        </div>-->
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
