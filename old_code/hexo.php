<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 模板</title>
    <?php include_once "include_code/bootcss.php"; ?>
    <style>
        .heart {
            animation:heartbeat 1s infinite;
            -webkit-animation:heartbeat 1s infinite;
            /* Safari 和 Chrome */

            width:198px;
            height:198px;
            background:#0f0;
            position:relative;
            filter:drop-shadow(0px 0px 20px rgb(20,255,20));
            transform:rotate(45deg);
            left:200px;
            top:50px;
        }
        .heart:before,.heart:after {
            content:"";
            position:absolute;
            width:200px;
            height:200px;
            background:#0f0;
            border-radius:100px;
        }
        .heart:before {
            left:-100px;
        }
        .heart:after {
            left:0;
            top:-100px;
        }
        @keyframes heartbeat {
            0% {
                transform:rotate(45deg) scale(0.8,0.8);
                opacity:1;
            }
            25% {
                transform:rotate(45deg) scale(1,1);
                opacity:0.8;
            }
            100% {
                transform:rotate(45deg) scale(0.8,0.8);
                opacity:1;
            }
        }
    </style>
</head>
<body>

<?php include_once "include_code/header.php"; ?>


<div class="container">

    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="h1">
                本地服务状态：
                <div class="heart"></div>
            </div>

        </div>
        <div class="col-4"></div>
    </div>
    <div class="row">

        <div class="col-lg-3 ">启动</div>
        <div class="col-lg-3 ">清除</div>
        <div class="col-lg-3 ">发布</div>
        <div class="col-lg-3 ">停止</div>

    </div>
</div>

</body>
</html>


