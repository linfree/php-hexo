<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-11
 * Time: 20:00
 */


class Blog
{
    public $tittle = '';
    public $status = '';
    public $content = '';
    public $modtime = '';

    public static $filename = '';
    public $dir = '';
    public $fm = '';

    private static $type = '';

    private static $src_dir = BLOG_DIR . '/';
    private static $file_dirs = array('post' => '_posts', 'draft' => '_drafts', 'recycle' => '_recycle');





    public function __construct($filename, $new = false)
    {

        $this->fm = new FileManage();
        $type = mb_detect_encoding($filename, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
        if ($type == 'UTF-8') {
            $filename = iconv('UTF-8', 'GB2312', $filename);
        }
        if ($this->fm->check_file_exists($filename)) {
            $this->init($filename);
        } elseif ($filename != '' && $new == true) {
            $this->new_blog($filename);
        } else {
            die('实例化博客参数出错');
        }
    }

    /**
     * 修改文章的名称
     * @param $new_name
     * @return bool
     */
    public function rename($new_name)
    {
        $dir = dirname($this->filename);
        $this->tittle = $new_name;
        return rename($this->filename, $dir . $new_name);
    }

    public function new_blog($tittle)
    {
        $this->tittle = $tittle;
        $this->dir = self::$blog_status_hash['draft'];
        $this->status = 'draft';
        $this->filename = $this->dir . '/' . $tittle . '.md';
        $type = mb_detect_encoding($this->filename, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
        if ($type == 'UTF-8') {
            $this->filename = iconv('UTF-8', 'GB2312', $this->filename);
        }
        file_put_contents($this->filename, "---\ntitle: {$tittle}\ndate: \ntags:");
        $this->modtime = $this->fm->get_modtime($this->filename);
        return $this;
    }

    # 初始化博客的信息
    public function init($file)
    {
        $this->filename = $file;
        $this->dir = $this->fm->get_file_dir($file);
        $this->content = $this->fm->get_content($file);
        $this->status = $this->get_status($this->dir);
        $this->tittle = $this->get_tittle($file);
        $this->modtime = $this->fm->get_modtime($file);
    }

    # 获取博客的内容
    public function get_content()
    {
        return $this->content;
    }

    public function get_tittle($filename)
    {
        $filename = iconv('GB2312', 'UTF-8', $filename);
        return basename($filename, '.md');
    }

    # 修改博客的状态和文件的位置
    public function modifi_status($status)
    {
        if ($this->status == $status) {
            return false;
        } else {
            $this->status = $status;
        }
        # 文件目录变更
        $dir = self::$blog_status_hash[$status];

        if (isset($dir)) {
            $this->fm->mv_file($this->filename, $dir);
        } else {
            return false;
        }
        return true;
    }

    public static function tittle_to_filename($type, $tittle)
    {
        if (!in_array($type, array_keys(self::$blog_status_hash))) {
            return_404();
        } else {
            $res = new \libs\FileManage();
            $dir = self::get_status_path($type);
            $filename = $dir . $tittle;
            #$filename = iconv('UTF-8',"GB2312",$filename);
            if (!$res->check_file_exists($filename)) {
                return_404();
            } else {
                #return iconv("GB2312",'UTF-8',$filename);
                return $filename;
            };

        }
    }


    # 删除博客
    public function remove()
    {
        unlink($this->filename);
        return true;
    }

    public static function get_status_path($status)
    {
        return self::$blog_status_hash[$status];
    }

    /**
     * 保存博客的内容
     * @param $content
     * @return bool|int
     */
    public function save($content)
    {
        $this->content = $content;
        return $this->fm->write_content($this->filename, $content);
    }

    /**
     * 获取当前博客的状态
     * @return bool|string
     */
    public function get_status($dir)
    {
        switch ($dir) {
            case RECYCLE_DIR:
                $status = 'recycle';
                break;
            case PUT_DIR:
                $status = 'put';
                break;
            case DRAFT_DIR:
                $status = 'draft';
                break;
            default:
                $status = 'error';
                break;
        }
        return $status;
    }


}