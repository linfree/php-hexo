<?php

/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/6/25
 * Time: 15:01
 */

/**
 * Class Hexoer
 * ajax请求hexoer控制器操作hexo
 */
class Hexoer extends MpController
{

    /**
     * 开始启动hexo预览服务
     *
     */
    public function doStart()
    {
        $hexo = new Hexo();
        $res = $hexo->server();
        echo $res;
    }

    /**
     * 关闭启动hexo预览服务
     *
     */
    public function doStop()
    {
        $hexo = new Hexo();
        $res = $hexo->kill_server();
        echo $res;
    }


    /**
     * 清理hexo缓存文件
     */
    public function doClear()
    {
        $hexo = new Hexo();
        $res = $hexo->clear();
        $this->ajax_echo(200, '', $res);
    }

    /**
     * 部署deploy
     */
    public function doDeploy()
    {
        $hexo = new Hexo();
        $hexo->deploy();
    }


    /**
     * 新建博客
     */
    public function doNew()
    {
        echo BLOG_DIR . '/' . HConfig::get('source_dir') . '/_posts/' . $_POST['newname'] . '.md';

        FileManage::write_content(BLOG_DIR . '/' . HConfig::get('source_dir') . '/_posts/' . $_POST['newname'] . '.md', $_POST['content'], true);
    }

    /**
     * 编辑博客
     */
    public function doEdit($name, $type = 'post')
    {


        $oldname = trim($_POST['oldname']) . '.md';
        $newname = trim($_POST['newname']) . '.md';
        $content = trim($_POST['content']);

        $oldfile = ParseBlog::parse($oldname, $type)['full_dir'];

        if ($oldname !== $newname) {
            FileManage::mv_file($oldfile, dirname($oldfile) . '/' . $newname);
        }

        FileManage::write_content(ParseBlog::parse($newname, $type)['full_dir'], $content);


        $this->ajax_echo(200, '', $_REQUEST);

    }


    /**
     * 生成静态文件
     */
    public function doGenerate()
    {
        $hexo = new Hexo();
        $hexo->generate();
    }

    /**
     * 显示hexo版本信息
     */
    public function doVersion()
    {
        $hexo = new Hexo();
        $res = $hexo->version();
        $this->ajax_echo(200, '', $res);
    }

    /**
     * 列出现有文章,页面,标签等
     * @param string $type
     * $type in array([page, post, route, tag, category])
     */
    public function doList($type = 'post')
    {
        // 判断是不是合法的参数
        if (!in_array($type, array("page", "post", "route", "tag", "category"))) {
            return $this->ajax_echo(200, '', '参数错误');
        }
        $hexo = new Hexo();
        $res = $hexo->lists($type);

        for ($i = 0; $i < count($res); $i++) {
            if ($i > 1) {
                $tmp['name'] = preg_split('/\s{2,}/', $res[$i])[1];
                $tmp['status'] = preg_split('/\s{2,}/', $res[$i])[2];
                $res_new[] = $tmp;
            }
        }
        $this->ajax_echo(0, '', $res_new);
    }


}