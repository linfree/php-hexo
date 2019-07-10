<?php
/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/6/26
 * Time: 9:48
 */


include($this->view_path('public/header_start'));

?>


<!--第一步：引入Javascript / CSS （CDN）-->
<!-- Markdown Editor CSS -->
<link rel="stylesheet" href="assets/lib/material-icons.css" xmlns="http://www.w3.org/1999/html">
<link rel="stylesheet" href="assets/lib/base16-light.css">
<link rel="stylesheet" href="assets/codemirror/lib/codemirror.css">
<link rel="stylesheet" href="assets/lib/default.css">
<link rel="stylesheet" href="assets/lib/github-markdown.css">
<link rel="stylesheet" href="assets/lib/spell-checker.min.css">
<link rel="stylesheet" href="assets/lib/sweetalert.css">
<!-- Markdown Editor CSS End -->

<!--index.css-->
<link rel="stylesheet" href="assets/css/edit.css">

<script>
    editUrl = "<?php
        echo isset($contents['filename']) ? url('#?hexoer.edit', $contents['filename']) : url('#?hexoer.new');
        ?>";
</script>
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
            <?php echo $title; ?>
        </div>
    </div>
</div>

<div id="toplevel">
    <form id="frm" class="layui-form" action="" lay-filter="example">
        <div id="in">
            <textarea id="code" name="content">
                <?php
                echo isset($contents['content']) ? $contents['content'] : '';
                ?>
            </textarea>
        </div>
        <div id="out" class="markdown-body"></div>
        <div id="menu">
            <span>Save As</span>
            <div id="saveas-markdown">
                <svg height="64" width="64" xmlns="http://www.w3.org/2000/svg">
                    <g transform="scale(0.0625)">
                        <path d="M950.154 192H73.846C33.127 192 0 225.12699999999995 0 265.846v492.308C0 798.875 33.127 832 73.846 832h876.308c40.721 0 73.846-33.125 73.846-73.846V265.846C1024 225.12699999999995 990.875 192 950.154 192zM576 703.875L448 704V512l-96 123.077L256 512v192H128V320h128l96 128 96-128 128-0.125V703.875zM767.091 735.875L608 512h96V320h128v192h96L767.091 735.875z"/>
                    </g>
                </svg>
                <span>Markdown</span>
            </div>
            <div id="saveas-html">
                <svg height="64" width="64" xmlns="http://www.w3.org/2000/svg">
                    <g transform="scale(0.0625) translate(64,0)">
                        <path d="M608 192l-96 96 224 224L512 736l96 96 288-320L608 192zM288 192L0 512l288 320 96-96L160 512l224-224L288 192z"/>
                    </g>
                </svg>
                <span>HTML</span>
            </div>
            <a id="close-menu">&times;</a>
        </div>
        <div id="navbar">
            <div id="navcontent">
                <a id="logo">
                    <p id="title" class="left">
                        <?php
                        if (isset($contents['filename'])) {
                            echo substr($contents['filename'],0,-3);
                        } else {
                            echo "<input id='newname' value='' type='text' name='newname' placeholder='请输入标题'  class='layui-input'>";
                        }
                        ?>
                    </p>
                    <input type="hidden" id="oldname" name="oldname"
                           value="<?php echo isset($contents['filename']) ? substr($contents['filename'],0,-3) : ''; ?>">
                </a>

                <p id="edittitle" class="navbutton left " style="margin-right: 20px; display: none;"
                   onclick="editTitle()">确定</p>
                <p id="openbutton" title="文件上传" class="navbutton left"
                   onclick="document.getElementById('fileInput').click();"><i class="material-icons">open_in_browser</i>
                </p>
                <input id="fileInput" type="file" class="hidden" accept=".md,.mdown,.txt,.markdown"/>
                <p id="savebutton" title="下载" class="navbutton left" onclick="showMenu()"><i class="material-icons">file_download</i>
                </p>
                <p id="browsersavebutton" title="保存" class="navbutton left" onclick="saveInBrowser()"><i
                            class="material-icons">save</i></p>
                <p id="sharebutton" title="分享链接" class="navbutton left" onclick="updateHash()"><i
                            class="material-icons">share</i></p>
                <p id="nightbutton" title="夜间模式" class="navbutton left" onclick="toggleNightMode(this)"><i
                            class="material-icons">invert_colors</i></p>
                <p id="readbutton" title="阅读模式" class="navbutton left" onclick="toggleReadMode(this)"><i
                            class="material-icons">chrome_reader_mode</i></p>
                <p id="spellbutton" title="Spell Check" class="navbutton left selected hidden"
                   onclick="toggleSpellCheck(this)"><i
                            class="material-icons">spellcheck</i></p>
                <p id="newbutton" class="navbutton left " onclick="clearEditor()">Clear</p>
                <p id="sharebutton" class="navbutton left selected hidden">Share</p>
            </div>
        </div>
    </form>
</div>


<!-- Markdown Editor JS -->
<script src="assets/lib/markdown-it.js"></script>
<script src="assets/lib/markdown-it-footnote.js"></script>
<script src="assets/lib/highlight.pack.js"></script>
<script src="assets/lib/emojify.js"></script>
<script src="assets/codemirror/lib/codemirror.js"></script>
<script src="assets/codemirror/overlay.js"></script>
<script src="assets/codemirror/xml/xml.js"></script>
<script src="assets/codemirror/markdown/markdown.js"></script>
<script src="assets/codemirror/gfm/gfm.js"></script>
<script src="assets/codemirror/javascript/javascript.js"></script>
<script src="assets/codemirror/css/css.js"></script>
<script src="assets/codemirror/htmlmixed/htmlmixed.js"></script>
<script src="assets/codemirror/lib/util/continuelist.js"></script>
<script src="assets/lib/spell-checker.min.js"></script>
<script src="assets/lib/rawinflate.js"></script>
<script src="assets/lib/rawdeflate.js"></script>
<script src="assets/lib/sweetalert.min.js"></script>
<!-- Markdown Editor JS END -->
<!--index.js-->
<script src="assets/js/edit.js"></script>

<!--双击输入框-->
<script type="text/javascript">


    $(document).ready(function () {
        /**
         * 双击事件
         */
        $("#title").dblclick(function () {
            var txt = $("#title").text();
            $(this).html("<input id='newname' value='" + txt + "' type='text' name='newname' placeholder='请输入标题'  class='layui-input'>");
            $("#edittitle").show();
        });

    });


    /**
     * 编辑表头
     */
    var editTitle = function () {
        $("#title").text($('#newname').val());
        $('#newname').hide();
        $("#edittitle").hide();
    }


</script>


</body>
<?php
include($this->view_path('public/footer'));
?>


</html>