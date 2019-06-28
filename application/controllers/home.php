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
     * 编辑blog
     * @param string $id
     */
    public function doEdit($name = '')
    {
        $data = array(
            'title' => '新建blog',
            'name' => $name,
            'content' => ''
        );
        $this->view('edit', $data);
    }


    /**
     * 显示博客列表
     * @param string $type 显示的类型 草稿或
     */
    public function doList($type = '')
    {
        $type = $type == 'draft' ? 'draft' : 'post';

        $hexo = new Hexo();
        $lists = $hexo->lists($type);

        for ($i = 0; $i < count($lists); $i++) {
            if ($i > 1) {
                $res[] = preg_split('/\s{2,}/', $lists[$i]);
            }
        }


        $data = array('name' => $type, "data" => $res);
        $this->view('list', $data);
    }

    /**
     * 新博客的编辑页面
     * @param $name
     */
    public function doNew()
    {
        $data = array('title' => '新建blog');
        $this->view('edit', $data);
    }

    /**
     * 设置页面
     * 设置hexo相关的信息，如git，如主题，目录等，_config.yml文件
     */
    public function doSetting()
    {
        $this->view('setting');
    }


    /**
     * 系统信息，状态
     * hexo版本，服务的状态，文章总数...
     */
    public function doStatus()
    {
        $this->view('status');
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