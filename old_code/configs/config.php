<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-11
 * Time: 20:00
 */
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("Asia/Shanghai");

define('DOC_ROOT', str_replace("\\", "/", dirname(__FILE__)) . '/../');
define('SRC_ROOT', '/assets/');
define('PUT_DIR', 'D:/WWW/myblog/new/linfree.github.io/source/_posts/'); # 发布博客的目录
define('DRAFT_DIR', 'D:/WWW/myblog/new/linfree.github.io/source/_drafts/'); # 草稿的目录
define('RECYCLE_DIR', 'D:/phpStudy/WWW/php_hexo/recycle/'); # 回收站


define('HEXO_DIR', 'C:/Users/Administrator/AppData/Roaming/npm/hexo');

define('BLOG_DIR', 'D:/WWW/myblog/new/linfree.github.io/');


function autoloadlib($class){
    $class_name = explode("\\", $class);
    $class_name = end($class_name);
    include_once DOC_ROOT . "libs/{$class_name}.class.php";
}

spl_autoload_register('autoloadlib');
