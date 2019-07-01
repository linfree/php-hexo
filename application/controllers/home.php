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

        /*$hexo = new Hexo();
        $lists = $hexo->lists($type);

        for ($i = 0; $i < count($lists); $i++) {
            if ($i > 1) {
                $res[] = preg_split('/\s{2,}/', $lists[$i]);
            }
        }*/

        $src_dir = BLOG_DIR . '/' . HConfig::get('source_dir');
        $post_dir = $src_dir . '/_posts';
        $draft_dir = $src_dir . '/_drafts';
        $recycle_dir = $src_dir . '/_recycle';

        $posts = FileManage::get_file_list($post_dir);
        $drafts = FileManage::get_file_list($draft_dir);
        $recycles = FileManage::get_file_list($recycle_dir);

        foreach ($posts as $post) {
            $res[] = array('name' => $post, 'type' => 'post', 'modtime' => FileManage::get_modtime($post));
        }

        foreach ($drafts as $draft) {
            $res[] = array('name' => $draft, 'type' => 'draft', 'modtime' => FileManage::get_modtime($draft));
        }

        /*foreach ($res as $re){
            $time[] = $re['modtime'];
        }
        array_multisort($time,SORT_NUMERIC,SORT_DESC,$res);*/
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