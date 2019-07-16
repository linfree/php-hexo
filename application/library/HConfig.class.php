<?php

/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-06-29
 * Time: 22:06
 */

use Symfony\Component\Yaml\Yaml;


class HConfig
{
    private static $conf_file = BLOG_DIR . '/_config.yml';


    /**
     * 获取hexo的配置文件信息
     * @param string $key 空则为全部配置，否则某个键值
     * @return bool|mixed false表示不存在
     */
    public static function get($key = '')
    {
        $config_arr = Yaml::parseFile(self::$conf_file, Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE);
        if ($key === '') {
            return $config_arr;
        } else {
            return array_key_exists($key, $config_arr) ? $config_arr[$key] : false;
        }
    }

    /**
     * 设置Hexo的配置文件
     * @param $key
     * @param $value
     * @return bool
     */
    public static function set($key, $value)
    {
        if ($key === "ALL" && is_array($value)) {
            $con = Yaml::dump($value);
            file_put_contents(self::$conf_file, $con);
            return true;
        } else {
            $config_arr = Yaml::parseFile(self::$conf_file);
            if (array_key_exists($key, $config_arr)) {
                $config_arr[$key] = $value;
                $con = Yaml::dump($config_arr);
                file_put_contents(self::$conf_file, $con);
                return true;
            } else {
                return false;
            }
        }
    }
}