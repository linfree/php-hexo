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


    public function doCheckLogin()
    {

        $user = trim(isset($_POST['username']) ? $_POST['username'] : "");
        $pass = trim(isset($_POST['pass']) ? $_POST['pass'] : "");


        $hash = password_hash($pass, PASSWORD_DEFAULT);
        if (password_verify(PASS, $hash)) {

            #echo('ok');

            $this->ajax_echo(1, '', 'success');
        } else {

            $this->ajax_echo(0, '', 'error');
        }


    }

}