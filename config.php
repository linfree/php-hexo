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
define('HEXO_DIR', 'D:\"Program Files"\nodejs\hexo');
/**
 * blog生成的目录
 **/
define('BLOG_DIR', 'D:\hexo_dir');
/**
 * 发布博客的目录
 **/
define('PUT_DIR', BLOG_DIR . '/source/_posts');
/**
 * 草稿的目录
 **/
define('DRAFT_DIR', BLOG_DIR . '/source/_drafts');
/**
 * 回收站目录
 **/
define('RECYCLE_DIR', BLOG_DIR . '/source/_recycle');

/**
 * hexo 预览的服务ip
 **/
define('HEXO_SERVER_IP', '0.0.0.0');

/**
 * hexo 预览的服务端口
 **/
define('HEXO_SERVER_PORT', '4000');

