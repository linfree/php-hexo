<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-12
 * Time: 21:14
 */

include_once 'configs/config.php';

$res = new \libs\Request();

$type = $res->get('type');
$file = $res->get('file');


if($type == '' or $file == ''){
    #return_404();
}else{
    $filename = \libs\Blog::typetittle_to_filename($type,$file);
    $blog = new \libs\Blog($filename);
    #print_r($blog->tittle);
    #print_r($blog->content);
}

function return_404(){
    header('HTTP/1.1 404 Not Found');
    header("status: 404 Not Found");
    exit();
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


<div id="layout">
    <header>
        <h1><?php echo $blog->tittle; ?></h1>
        <button id="new_blog">提交博客</button>
    </header>
    <div id="test-editormd">
        <textarea style="display:none;"><?php echo $blog->content; ?></textarea>
    </div>
</div>
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

