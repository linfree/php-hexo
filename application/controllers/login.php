<?php
/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/6/27
 * Time: 15:22
 */

class Login extends MpController
{
    /**
     * 登录页面
     */
    public function doLogin()
    {
        $this->view('login');
    }

}