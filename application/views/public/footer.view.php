<?php
/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/6/27
 * Time: 16:43
 */
?>


<script src="assets/layui/layui.all.js"></script>
<script>
    //由于模块都一次性加载，因此不用执行 layui.use() 来加载对应模块，直接使用即可：
    /*;!function(){
        var layer = layui.layer
            ,form = layui.form;

        layer.msg('Hello World');
    }();*/
    var loading = function () {
        index = layer.load(1, {
            shade: [0.5, '#111'], //0.1透明度的白色背景
        });

    }

    var close_loading =function () {
        layer.close(index);
    }
</script>


