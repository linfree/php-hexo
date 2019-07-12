<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-11
 * Time: 20:00
 */
header("Content-type: text/html; charset=utf-8");

/**
 * hexo执行文件的目录
 **/
define('HEXO_DIR','D:/"Program Files"/nodejs/hexo');
/**
 * blog生成的目录
 **/
define('BLOG_DIR','D:/hexo_dir');
/**
 * 发布博客的目录
 **/
define('PUT_DIR',BLOG_DIR . '/source/_posts');
/**
 * 草稿的目录
 **/
define('DRAFT_DIR',BLOG_DIR . '/source/_drafts');
/**
 * 回收站目录
 **/
define('RECYCLE_DIR',BLOG_DIR . '/source/_recycle');

/**
 * hexo 预览的服务ip
 **/
define('HEXO_SERVER_IP','0.0.0.0');

/**
 * hexo 预览的服务端口
 **/
define('HEXO_SERVER_PORT','4000');

/**
 * 用户名和密码
 * 默认密码:phphexo
 * $2y$10$HHI5ecGoMy7WUBMw62zW2uxUhX2hmvGqR4W0BR25O7VhZi7s8Z6aK
 * 忘记密码的时候直接将pass，修改成默认值
 */

define('USER','admin');


define('PASS','$2y$10$UckVx24iBcY5CDymQhyE.ePZRQ5fOSwol6Hsc68V6hg9QdCfqc5ie');


