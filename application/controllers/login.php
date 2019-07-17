<?php

/**
 * Created by PhpStorm.
 * User: linfree
 * Date: 2019/6/27
 * Time: 15:22
 */
class Login extends MpController{
    /**
     * 登录页面
     */
    public function doLogin(){
        sessionStart();
        if (isset($_SESSION['is_login'])){
            $this->redirect(url("home.index"));
        }
        $this->view('login');
    }


    public function doCheckLogin(){

        $user = $this->input->post('user', '', true);
        $pass = $this->input->post('pass', '', true);


        if($user != USER){
            return $this->ajax_echo(0, 'user error!', 'error');
        }

        if(password_verify($pass, PASS)){

            sessionStart();
            $_SESSION['user'] = 'admin';
            $_SESSION['is_login'] = true;

            return $this->ajax_echo(1, '登录成功', 'success');
        }else{
            return $this->ajax_echo(0, 'password error!', 'error');
        }


    }

    public function doOut(){
        session_unset();
        $this->redirect(url("login.login"));
    }

    public function doChangePassAjax(){
        $user = $this->input->post('user', '', true);
        $pass = $this->input->post('pass', '', true);
        $new_pass = $this->input->post('new_pass', '', true);

        if($user != USER){
            return $this->ajax_echo(0, 'user error', 'error');
        }

        if(password_verify($pass, PASS)){
            $hash = password_hash($new_pass, PASSWORD_DEFAULT);

            $C = new Conf('./config');
            $C->set('PASS', $hash)->save();
            session_unset();
            return $this->ajax_echo(1, '修改成功', 'error');
        }else{
            return $this->ajax_echo(0, 'password error', 'error');
        }
    }

    public function doChangePass(){
        $this->view('changepass');
    }

}