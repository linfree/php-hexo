<?php
/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/6/26
 * Time: 9:49
 */

include($this->view_path('public/header_start'));
?>

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
        <table id="list" lay-filter="demo" class="list">
            <thead>
            <tr>
                <th lay-data="{field:'num', width:60}">编号</th>
                <th lay-data="{field:'name'}">标题</th>
                <th lay-data="{field:'filename'}">文件名称</th>
                <th lay-data="{field:'modTime', width:220}">修改时间</th>
                <th lay-data="{field:'status', width:100}">状态</th>
                <th lay-data="{field:'operate', width:160}">操作</th>
            </tr>
            </thead>
            <tbody>

            <?php $i = 1;
            foreach ($data as $row) { ?>

                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['filename']; ?></td>
                    <td><?php echo $row['updated']; ?></td>
                    <td><?php echo $row['layout']; ?></td>
                    <td>
                        <button type="button" class="layui-btn layui-btn-danger layui-btn-xs">删除</button>
                        <button type="button" class="layui-btn layui-btn-xs"><a
                                    href="<?php echo url("#?home.edit", $row['filename'], $row['layout']); ?>">编辑</a>
                        </button>
                        <?php if ($row['layout'] == 'post') { ?>
                            <button type="button" class="layui-btn layui-btn-normal layui-btn-xs">转草</button>
                        <?php } else { ?>
                            <button type="button" class="layui-btn layui-btn-normal layui-btn-xs">推送</button>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>
</div>
</body>
<script>
    /**
     * datatable初始化的js
     */
    $(document).ready(function () {
            var table = layui.table;
            //转换静态表格
            table.init('demo', {
                page: true //开启分页
                , limit: 15
                , defaultToolbar: {
                    filter: true
                }
                //支持所有基础参数
            });
        }
    )
    ;


</script>
<?php
include($this->view_path('public/footer'));
?>
</html>
