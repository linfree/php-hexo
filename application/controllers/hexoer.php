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
        $this->ajax_echo(1, '清理成功.', $res);
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
        $this->ajax_echo(1, '获取成功', $res_new);
    }

    public function doSetting()
    {
        $old_config = HConfig::get();


        $sitename = $this->input->post("sitename");
        $subtitle = $this->input->post("subtitle");
        $description = $this->input->post("description");
        $keywords = $this->input->post("keywords");
        $author = $this->input->post("author");
        $url = $this->input->post("url");
        $root = $this->input->post("root");
        $source_dir = $this->input->post("source_dir");
        $default_layout = $this->input->post("default_layout");
        $per_page = $this->input->post("per_page");
        $theme = $this->input->post("theme");
        $git_repo = $this->input->post("git_repo");
        $git_branch = $this->input->post("git_branch");
        $git_message = $this->input->post("git_message");


        $settings = array(
            "title" => $sitename,
            "subtitle" => $subtitle,
            "description" => $description,
            "keywords" => $keywords,
            "author" => $author,
            "url" => $url,
            "root" => $root,
            "source_dir" => $source_dir,
            "default_layout" => $default_layout,
            "per_page" => (int)$per_page,
            "theme" => $theme,
            "deploy" => array_merge(
                $old_config['deploy'],
                array(
                "repo" => $git_repo,
                "branch" => $git_branch,
                "message" => $git_message
            )
            ),
        );


        $settings = array_merge($old_config, $settings);
        HConfig::set("ALL", $settings);
        $this->ajax_echo(1, '修改成功', 'success');
    }


}