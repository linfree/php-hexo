<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-20
 * Time: 15:41
 */
include_once 'configs/config.php';

if($_POST){
    $request = new \libs\Request();
    $tittle = $request->post('tittle');
    if($tittle != ''){
        $blog = new \libs\Blog($tittle, true);
        $blog->content = $request->post('content');
        $blog->save($blog->content);

        header("Location: detail.php?type={$blog->status}&file={$tittle}.md");

    }

}

?>


<html lang="zh">
<head>
    <meta charset="utf-8"/>
    <title>Simple example - Editor.md examples</title>


    <?php include_once "include_code/bootcss.php"; ?>

    <link rel="stylesheet" href="editor/examples/css/style.css"/>
    <link rel="stylesheet" href="editor/css/editormd.css"/>
    <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon"/>
</head>
<body>

<?php include_once "include_code/header.php"; ?>

<form action="#" method="post">
    <div id="layout">
        <header>
            <div class="h2">标题:
                <input type="text" name="tittle"></div>
            <button class="btn " id="new_blog" type="submit">新建博客</button>
        </header>
        <div id="test-editormd">
        <textarea style="display:none;" name="content">---
title:
date:
tags:
  -
desc:
keywords:
categories:
-

---</textarea>
        </div>
    </div>
</form>
<script src="editor/examples/js/jquery.min.js"></script>
<script src="editor/editormd.js"></script>
<script type="text/javascript">
    var testEditor;
    $(function () {
        testEditor = editormd("test-editormd", {
            width: "90%",
            height: 640,
            theme: "dark",
            // Preview container theme, added v1.5.0
            // You can also custom css class .editormd-preview-theme-xxxx
            previewTheme: "dark",
            // Added @v1.5.0 & after version is CodeMirror (editor area) theme
            editorTheme: "pastel-on-dark",
            syncScrolling: "single",
            path: "editor/lib/"
        });
    });

</script>

</body>
</html>


