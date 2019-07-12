<?php
/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/7/12
 * Time: 17:15
 */

class AuthController extends MpController
{
    public function __construct()
    {


        parent::__construct();
        sessionStart();
        if (!$this->input->session("is_login")){
            $this->redirect(url("#?/login.login"));
        }

    }
}