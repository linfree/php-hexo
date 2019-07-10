<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-11
 * Time: 20:35
 */


class FileManage
{

    /**
     * # 获取目录下文件的列表
     * @param $dir
     * @return array|bool
     */
    public static function get_file_list($dir)
    {
        //获取某目录下所有文件、目录名（不包括子目录下文件、目录名）
        if (self::check_file_exists($dir)) {
            $files = [];


            $dir = mb_convert_encoding($dir, "GBK", "utf-8");
            $files1 = scandir($dir);
            foreach ($files1 as $filename) {
                if (!is_dir($filename) && strpos($filename, ".") != false) {

                    /*$type = mb_detect_encoding($filename, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5", 'EUC-CN'));
                    if ($type == 'EUC-CN' or $type == 'GB2312' or $type == 'GBK') {*/


                    /**
                     * mb_detect_encoding 不准确，不能依赖这个
                     * 感谢大佬【海鳗】的指点
                     */
                    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                        $filename = mb_convert_encoding($filename, "UTF-8", "GBK");
                    }
                    $files[] = $filename;
                }
            }
            return $files;
        } else {
            return [];
        }
    }


    /**
     *  # 获取文件的内容
     * @param $filename
     * @return bool|string
     */
    public static function get_content($filename = '')
    {
        if (self::check_file_exists($filename)) {
            $type = mb_detect_encoding($filename, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
            if ($type == 'UTF-8') {
                $filename = iconv("UTF-8", "GBK", $filename);
            }
            $content = file_get_contents($filename);
            return $content;
        } else {
            return false;
        }
    }


    /**
     * # 写入内容到文件
     * @param $filename
     * @param $content
     * @return bool|int
     */
    public static function write_content($filename, $content, $isnew = false)
    {

        var_dump($filename);
        if (self::check_file_exists($filename) or $isnew) {

            $type = mb_detect_encoding($filename, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
            if ($type == 'UTF-8') {
                $filename = iconv("UTF-8", "GBK", $filename);
            }
            $result = file_put_contents($filename, $content);
            return $result;
        } else {
            return false;
        }
    }


    /**
     * # 获取文件指定的行
     * @param $filename
     * @param int $line
     * @return bool|string
     */
    /*public static function get_head($filename, $line = 1)
        {
            $myfile = fopen($filename, "r") or die("Unable to open file!");
            $i = 1;
            while (!feof($myfile) && $i <= $line) {
                $content = fgets($myfile);
            };
            fclose($myfile);
            return $content;
        }*/

    /**
     * 判断文件是否存在
     * @param $filename
     * @return bool
     */
    public static function check_file_exists($filename)
    {
        if ($filename == '') {
            return false;
        }
        $en_type = mb_detect_encoding($filename, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));


        var_dump('FileManage::check_file_exists()');
        var_dump($en_type);
        var_dump($filename);

        if ($en_type == 'UTF-8') {
            $filename = iconv("UTF-8", "GBK", $filename);
        }
        return file_exists($filename);
    }


    public static function get_file_dir($filename)
    {
        return dirname($filename);
    }


    /**
     * 功能: 移动文件
     * @param $file -- 待移动的文件名
     * @param $destfile -- 目标文件名
     * @param int $overwrite 如果目标文件存在，是否覆盖.默认是覆盖.
     * @param int $bak 是否保留原文件 默认是不保留即删除原文件
     * @return bool
     */
    public static function mv_file($file, $destfile, $overwrite = 1, $bak = 0)
    {
        $file = str_replace('\\', '/', $file);
        $destfile = str_replace('\\', '/', $destfile);

        $type = mb_detect_encoding($file, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
        if ($type == 'UTF-8') {
            $file = iconv("UTF-8", "GBK", $file);
        }

        $type = mb_detect_encoding($destfile, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
        if ($type == 'UTF-8') {
            $destfile = iconv("UTF-8", "GBK", $destfile);
        }

        if (file_exists($destfile)) {
            if ($overwrite)
                unlink($destfile);
            else
                return false;
        }
        if ($cf = copy($file, $destfile)) {
            if (!$bak)
                return (unlink($file));
        }
        return ($cf);
    }


    /**
     * 获取文件修改时间
     * @param $filename
     * @return bool|false|string
     */
    public static function get_modtime($filename)
    {
        if (self::check_file_exists($filename)) {
            $type = mb_detect_encoding($filename, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
            if ($type == 'UTF-8') {
                $filename = iconv("UTF-8", "GBK", $filename);
            }
            return date("Y-m-d H:i:s", filectime($filename));
        } else {
            return false;
        }
    }

}