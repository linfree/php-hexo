<?php

class Home extends MpController
{


    /**
     * 首页
     */
    public function doIndex()
    {
        $this->view('index');
    }


    /**
     * 新博客的编辑页面
     * @param $name
     */
    public function doNew()
    {
        $content = FileManage::get_content(BLOG_DIR . '/scaffolds/' . HConfig::get('default_layout') . '.md');

        $data = array(
            'title' => '新建blog',
            'page' => 'new',
            'contents' => array('content' => $content),
        );
        $this->view('edit', $data);
    }

    /**
     * 编辑blog
     * @param string $id
     */
    public function doEdit($name = '', $type = 'post')
    {

        if (substr(trim($name), -3) != '.md') {
            $name = $name . '.md';
        }


        $re = '/[`~!@#$%^&*()_|+=?;:\'",<>\{\}\[\]\\\\\/\s]/i';
        $name = preg_replace($re, '', $name);


        $data = array(
            'title' => '编辑文章',
            'page' => 'edit',

        );
        $data['contents'] = EditBlog::parse($name, $type);
        $this->view('edit', $data);
    }


    /**
     * 显示博客列表
     * @param string $type 显示的类型 草稿或
     */
    public function doList($type = '')
    {
        $type = $type == 'draft' ? 'draft' : 'post';


        $src_dir = BLOG_DIR . '/' . HConfig::get('source_dir');
        $post_dir = $src_dir . '/_posts';
        $draft_dir = $src_dir . '/_drafts';
        $recycle_dir = $src_dir . '/_recycle';

        $posts = FileManage::get_file_list($post_dir);
        $drafts = FileManage::get_file_list($draft_dir);
        //$recycles = FileManage::get_file_list($recycle_dir);
        $res = [];


        foreach ($posts as $post) {
            $res[] = ParseBlog::parse($post);
        }

        foreach ($drafts as $draft) {
            $res[] = ParseBlog::parse($draft, 'draft');
        }
        foreach ($res as $key => $row) {

            $updated[$key] = $row['updated'];
        }
        array_multisort($updated, SORT_DESC, $res);
        $data = array('name' => $type, "data" => $res);
        $this->view('list', $data);
    }

    /**
     * 设置页面
     * 设置hexo相关的信息，如git，如主题，目录等，_config.yml文件
     */
    public function doSetting()
    {

        $settings = HConfig::get();
        var_dump($settings);
        if ($settings['deploy']['type'] == null) {
            $git['type'] = 'git';
            $git['repo'] = null ;# <repository url> https://bitbucket.org/JohnSmith/johnsmith.bitbucket.io;
            $git['branch'] = 'master';#'# [branch] published';
            $git['message'] = null;# 自定义提交信息 (默认为 Site updated: {{ now(\'YYYY-MM-DD HH:mm:ss\') }});
            HConfig::set('deploy', $git);
        }
        $this->view('setting', $settings);
    }


    /**
     * 系统信息，状态
     * hexo版本，服务的状态，文章总数...
     */
    public function doStatus()
    {
        $hexo = new Hexo();

        $server_status = $hexo->find_server();
        $server_ip = HEXO_SERVER_IP;
        $server_port = HEXO_SERVER_PORT;

        $hexo_info = $hexo->version();

        $data = array(
            "server_status" => $server_status,
            "server_ip" => $server_ip,
            "server_port" => $server_port,
            "hexo_info" => $hexo_info,
        );
        var_dump($data);
        $this->view('status',$data);
    }

    /**
     * 关于页面
     */
    public function doAbout()
    {
        $this->view('about');
    }

    /**
     * 初始化的界面
     */
    public function doInit()
    {
        $this->view('init');
    }
}