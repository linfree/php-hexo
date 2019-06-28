<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-19
 * Time: 23:41
 */
include_once 'configs/config.php';

$request = new \libs\Request();
$fm = new \libs\FileManage();
if($request->get('t') == 'recycles'){
    $recycles = $fm->get_file_list(RECYCLE_DIR);
    $files = $recycles;
}else{
    $drafts = $fm->get_file_list(DRAFT_DIR);
    $puts = $fm->get_file_list(PUT_DIR);
    $files = array_merge($puts, $drafts);
}
$blog_list = [];
foreach($files as $file){
    $blog = new \libs\Blog($file);
    $blog_list[] = $blog;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 模板</title>
    <?php include_once "include_code/bootcss.php"; ?>

</head>
<body>

<?php include_once "include_code/header.php"; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-4 col-md-1 col-lg-2"></div>
        <div class="col-4">
            <button type="button" class="btn btn-info">新建文章</button>
        </div>


    </div>
    <div class="row">
        <div class="col-4 col-md-1 col-lg-2"></div>
        <div class="col-4 col-md-10 col-lg-8 text-success">

            <table class=" table table-bordered">
                <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>博客名称</th>
                    <th>修改时间</th>
                    <th>状态</th>

                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="UserList">
                <?php
                $i = 1;
                foreach($blog_list as $blog){
                    ?>
                    <tr class="" data-id="<?php echo $blog->tittle; ?>">
                        <td><?php echo $i++; ?> </td>
                        <td>
                            <?php echo $blog->tittle; ?>
                        </td>

                        <td><?php echo $blog->modtime; ?></td>

                        <td>
                            <?php
                            if($blog->status == 'recycle'){
                                echo '<span>清理</span>';
                            }elseif($blog->status == 'put'){
                                echo '<span>推送</span>';
                            }elseif($blog->status == 'draft'){
                                echo '<span>草稿</span>';
                            }
                            ?>
                        </td>


                        <td>

                            <span class="label label-danger">删除</span>
                            <span class="label label-primary">修改</span>
                            <span>
                                <a class="label label-success" href="detail.php?type=<?php echo $blog->status; ?>&file=<?php echo urlencode($blog->tittle) . ".md"; ?>">
                                    详细
                                </a>
                            </span>
                        </td>

                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-4 col-md-1 col-lg-2"></div>

    </div>
</div>


<!-----HEADER END----->


<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

