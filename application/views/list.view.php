<?php
/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/6/26
 * Time: 9:49
 */

include($this->view_path('public/header_start'));

?>


<!--第一步：引入Javascript / CSS （CDN）-->
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8"
        src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>


<!-- Styles -->
<style>
    .table-div {
        width: 100%;
    }

    .list {
        margin-top: 10px;
        border: 1px solid #a5a1a0;
        border-radius: 4px;
        width: 100%;
    }

    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 8px;
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
    <div class="content " style="width: 100%">
        <div class="title-2 m-b-md">
            文章列表
        </div>
    </div>

</div>
<div class=" flex-center position-ref content  " style="width: 60%;margin: 0 20%">
    <div class="links table-div">
        <table id="list" class="list">
            <thead>
            <tr>
                <td>编号</td>
                <td>名称</td>
                <td>修改时间</td>
                <td>状态</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>

            <?php $i=0;foreach ($data as $row) { ?>

                <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $row[1]?></td>
                    <td><?php echo $row[0]?></td>
                    <td><?php echo $row[2]?></td>
                    <td>
                        <button type="button" class="layui-btn layui-btn-danger layui-btn-xs">删除</button>
                        <button type="button" class="layui-btn layui-btn-xs">编辑</button>
                        <button type="button" class="layui-btn layui-btn-normal layui-btn-xs">推送</button>

                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <table id="demo" lay-filter="test"></table>
    </div>
</div>
</body>
<script>
    /**
     * datatable初始化的js
     */
    $(document).ready(function () {
            $('#list').DataTable(
                {

                    "order": [[0, 'asc']],

                    "columns":
                        [
                            null,
                            null,
                            null,
                            {"orderable": false},
                            {"orderable": false},
                        ],
                    'language': {
                        "sProcessing": "处理中...",
                        "sLengthMenu": "显示 _MENU_ 项结果",
                        "sZeroRecords": "没有匹配结果",
                        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                        "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                        "sInfoPostFix": "",
                        "sSearch": "搜索:",
                        "sUrl": "",
                        "emptyTable": "无可用数据",
                        "sEmptyTable": "表中数据为空",
                        "sLoadingRecords": "载入中...",
                        "sInfoThousands": ",",
                        "oPaginate": {
                            "sFirst": "首页",
                            "sPrevious": "上页",
                            "sNext": "下页",
                            "sLast": "末页"
                        },
                        "oAria": {
                            "sSortAscending": ": 以升序排列此列",
                            "sSortDescending": ": 以降序排列此列"
                        }
                    }

                });
        //第一个实例
        var table = layui.table;
        table.render({
            elem: '#demo'
            ,height: 312
            ,url: '<?php echo url('#?hexoer.list');?>' //数据接口
            ,page: true //开启分页
            ,cols: [[ //表头
                {field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
                ,{field: 'name', title: '名称', width:80}
                ,{field: 'date', title: '修改时间', width:80, sort: true}
                ,{field: 'status', title: '状态', width:80}
                ,{field: 'operate', title: '操作', width: 177}

            ]]
        });
        },

    )
    ;


</script>
<?php
include($this->view_path('public/footer'));
?>
</html>
