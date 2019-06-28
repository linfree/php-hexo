<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-10
 * Time: 21:32
 */

require_once 'configs/config.php';

$yang = new \libs\Yang();

if($_POST){
    $res = new \libs\Request();
    $user = $res->post('user');
    $pass = $res->post('pass');
    $yang->login($user, $pass);

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>登陆页面</title>
    <?php include_once "include_code/bootcss.php"; ?>

    <link rel="stylesheet" type="text/css" href="./assets/css/login.css">
</head>
<body>

<!-----HEADER STAR----->

<div class="container">

    <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->


<!-----HEADER END----->


<script>
    //宇宙特效
//    "use strict";
//    var canvas = document.getElementById('canvas'),
//        ctx = canvas.getContext('2d'),
//        w = canvas.width = window.innerWidth,
//        h = canvas.height = window.innerHeight,
//
//        hue = 217,
//        stars = [],
//        count = 0,
//        maxStars = 1300;//星星数量
//
//    var canvas2 = document.createElement('canvas'),
//        ctx2 = canvas2.getContext('2d');
//    canvas2.width = 100;
//    canvas2.height = 100;
//    var half = canvas2.width / 2,
//        gradient2 = ctx2.createRadialGradient(half, half, 0, half, half, half);
//    gradient2.addColorStop(0.025, '#CCC');
//    gradient2.addColorStop(0.1, 'hsl(' + hue + ', 61%, 33%)');
//    gradient2.addColorStop(0.25, 'hsl(' + hue + ', 64%, 6%)');
//    gradient2.addColorStop(1, 'transparent');
//
//    ctx2.fillStyle = gradient2;
//    ctx2.beginPath();
//    ctx2.arc(half, half, half, 0, Math.PI * 2);
//    ctx2.fill();
//
//    // End cache
//
//    function random(min, max) {
//        if (arguments.length < 2) {
//            max = min;
//            min = 0;
//        }
//
//        if (min > max) {
//            var hold = max;
//            max = min;
//            min = hold;
//        }
//
//        return Math.floor(Math.random() * (max - min + 1)) + min;
//    }
//
//    function maxOrbit(x, y) {
//        var max = Math.max(x, y),
//            diameter = Math.round(Math.sqrt(max * max + max * max));
//        return diameter / 2;
//        //星星移动范围，值越大范围越小，
//    }
//
//    var Star = function () {
//
//        this.orbitRadius = random(maxOrbit(w, h));
//        this.radius = random(60, this.orbitRadius) / 8;
//        //星星大小
//        this.orbitX = w / 2;
//        this.orbitY = h / 2;
//        this.timePassed = random(0, maxStars);
//        this.speed = random(this.orbitRadius) / 50000;
//        //星星移动速度
//        this.alpha = random(2, 10) / 10;
//
//        count++;
//        stars[count] = this;
//    }
//
//    Star.prototype.draw = function () {
//        var x = Math.sin(this.timePassed) * this.orbitRadius + this.orbitX,
//            y = Math.cos(this.timePassed) * this.orbitRadius + this.orbitY,
//            twinkle = random(10);
//
//        if (twinkle === 1 && this.alpha > 0) {
//            this.alpha -= 0.05;
//        } else if (twinkle === 2 && this.alpha < 1) {
//            this.alpha += 0.05;
//        }
//
//        ctx.globalAlpha = this.alpha;
//        ctx.drawImage(canvas2, x - this.radius / 2, y - this.radius / 2, this.radius, this.radius);
//        this.timePassed += this.speed;
//    }
//
//    for (var i = 0; i < maxStars; i++) {
//        new Star();
//    }
//
//    function animation() {
//        ctx.globalCompositeOperation = 'source-over';
//        ctx.globalAlpha = 0.5; //尾巴
//        ctx.fillStyle = 'hsla(' + hue + ', 64%, 6%, 2)';
//        ctx.fillRect(0, 0, w, h)
//
//        ctx.globalCompositeOperation = 'lighter';
//        for (var i = 1, l = stars.length; i < l; i++) {
//            stars[i].draw();
//        }
//        ;
//
//        window.requestAnimationFrame(animation);
//    }
//
//    animation();
</script>


<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

