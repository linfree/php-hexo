<?php
/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/7/2
 * Time: 23:02
 */

class EditBlog extends ParseBlog
{

    public function __construct($name, $type = 'post')
    {
        self::$contents = parent::parse($name, $type);
    }

    /**
     * 修改内容
     */


    /**
     * 修改文件名称
     */

    /**
     * 修改类型
     */


    /**
     * 判断重复
     */

    /**
     *
     */


}