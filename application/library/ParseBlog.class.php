<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-11
 * Time: 20:00
 */


class ParseBlog
{
    public static $contents = array(

        'layout' => '',
        'source' => '',
        'published' => '',
        'updated' => '',
        'filename' => '',
        'full_dir' => '',

        'content' => '',
        'title' => '',
        'date' => '',

    );

    private static $src_dir = BLOG_DIR;
    private static $file_dirs = array(
        'post' => '_posts',
        'draft' => '_drafts',
        'recycle' => '_recycle'
    );


    /**
     *
     * @param $filename "xxxxxx.md"
     * @param string $type ['post','page','draft']
     *
     */

    public static function parse($file, $type = 'post')
    {
        if(substr(trim($file), -3) != '.md'){
            $file = $file . '.md';
        }

        $dir = self::$src_dir . '/' . HConfig::get('source_dir') . '/' . self::$file_dirs[$type];
        $filename = $dir . '/' . $file;

        /**
        $en_type = mb_detect_encoding($filename, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
        if ($en_type == 'UTF-8') {
            $filename = mb_convert_encoding($filename, 'GBK', 'UTF-8');
            var_dump($filename);
        }*/

        if (FileManage::check_file_exists($filename)) {
            /* 初始化文件位置相关参数 */
            self::init($file, $type);
            /* 获取文件内容相关的属性 */
            self::prase_content(self::$contents['full_dir']);

            return self::$contents;
        } else {
            die('实例化博客参数出错');
        }
    }


    public static function dump()
    {
        $dir = self::$src_dir . '/' . HConfig::get('source') . '/' . self::$file_dirs[self::$contents['layout']];
        $filename = $dir . '/' . self::$contents['filename'];
        FileManage::write_content($filename, self::$contents['content']);
    }


    # 初始化博客的信息
    private static function init($file, $type = 'post')
    {
        /* 获取文件位置相关参数 */
        $contents['filename'] = $file;
        $contents['layout'] = $type;
        $contents['published'] = $type == 'post' ? 1 : 0;

        $contents['source'] = HConfig::get('source_dir') . '/' . self::$file_dirs[$type] . '/' . $file;
        $contents['full_dir'] = self::$src_dir . '/' . $contents['source'];
        $contents['updated'] = FileManage::get_modtime($contents['full_dir']);

        self::$contents = array_merge(self::$contents, $contents);
        return self::$contents;
    }


    public static function prase_content($file)
    {
        $content = FileManage::get_content($file);
        $head_re = '/---([\s\S]+)---/mU';
        preg_match_all($head_re, $content, $matches, PREG_SET_ORDER, 0);
        // Print the entire match result
        if (isset($matches[0][1])) {
            $head = $matches[0][1];
            $contents['content'] = $content;
            $contents['title'] = self::get_tittle($head);
            $contents['date'] = self::get_date($head);
            self::$contents = array_merge(self::$contents, $contents);
            return self::$contents;
        } else {
            return false;
        }
    }


    /**
     *
     * @param $head
     */
    private static function get_tittle($head)
    {
        $re = '/title:\s(.*)\n/mU';
        preg_match_all($re, $head, $matches, PREG_SET_ORDER, 0);
        // Print the entire match result
        return $matches[0][1];
    }

    private static function get_date($head)
    {
        $re = '/date:\s(.*)\n/mU';
        preg_match_all($re, $head, $matches, PREG_SET_ORDER, 0);
        // Print the entire match result
        return $matches[0][1];
    }


    /**
     * 修改文章的名称
     * @param $new_name
     * @return bool
     */
    /* public function rename($new_name)
     {
         $dir = dirname($this->filename);
         $this->tittle = $new_name;
         return rename($this->filename, $dir . $new_name);
     }*/


    /*public function new_blog($tittle)
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
    }*/


    # 修改博客的状态和文件的位置
    /*public function modifi_status($status)
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
    }*/

    /* public static function tittle_to_filename($type, $tittle)
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
     }*/


    # 删除博客
    /*public function remove()
    {
        unlink($this->filename);
        return true;
    }*/

    /*public static function get_status_path($status)
    {
        return self::$blog_status_hash[$status];
    }*/

    /**
     * 保存博客的内容
     * @param $content
     * @return bool|int
     */
    /*public function save($content)
    {
        $this->content = $content;
        return $this->fm->write_content($this->filename, $content);
    }*/


}