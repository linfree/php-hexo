<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-11
 * Time: 20:35
 */

namespace libs;


class FileManage{
    public $current_path = '';

    public $current_file = '';


    public function __construct(){


    }

    /**
     * # 获取目录下文件的列表
     * @param $dir
     * @return array|bool
     */
    public function get_file_list($dir){
        //获取某目录下所有文件、目录名（不包括子目录下文件、目录名）
        if($this->check_file_exists($dir)){
            $files = [];
            $handler = opendir($dir);
            while(($filename = readdir($handler)) !== false){//务必使用!==，防止目录下出现类似文件名“0”等情况
                if($filename != "." && $filename != ".."){
                    $files[] = $dir . $filename;
                }
            }
            closedir($handler);
            return $files;
        }else{
            return [];
        }
    }


    /**
     *  # 获取文件的内容
     * @param $filename
     * @return bool|string
     */
    public function get_content($filename = ''){
        if($this->check_file_exists($filename)){
            $content = file_get_contents($filename);
            return $content;
        }else{
            return false;
        }
    }


    /**
     * # 写入内容到文件
     * @param $filename
     * @param $content
     * @return bool|int
     */
    public function write_content($filename, $content){
        if($this->check_file_exists($filename)){
            $result = file_put_contents($filename, $content);
            return $result;
        }else{
            return false;
        }
    }


    /**
     * # 获取文件指定的行
     * @param $filename
     * @param int $line
     * @return bool|string
     */
    public function get_head($filename, $line = 1){
        $myfile = fopen($filename, "r") or die("Unable to open file!");
        $i = 1;
        while(!feof($myfile) && $i <= $line){
            $content = fgets($myfile);
        };
        fclose($myfile);
        return $content;
    }

    /**
     * 判断文件是否存在
     * @param $filename
     * @return bool
     */
    public function check_file_exists($filename){
        $type = mb_detect_encoding($filename, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
        if($filename == ''){
            return false;
        }
        if($type == 'UTF-8'){
            $filename = iconv("UTF-8", "GBK", $filename);
        }
        return file_exists($filename);
    }


    public function get_file_dir($filename){
        return dirname($filename) . '/';
    }

    /**
     * 移动文件的目录
     * @param $filename | 原始文件名，带地址
     * @param $dir |新的目录的名称
     * @return bool
     */
    public function mv_file($filename, $dir){
        $old_name = $filename;
        $base_name = basename($old_name);
        $new_name = $dir . $base_name;
        return rename($old_name, $new_name);
    }

    public function get_modtime($filename){
        return date("Y-m-d H:i:s",filemtime($filename));
    }

}