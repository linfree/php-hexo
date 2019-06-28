<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-10
 * Time: 21:35
 */

namespace libs;


class User{

    public $pass = '';
    public $user = '';

    public function __construct(){
        //开启一个会话
        session_start();
    }

    public function login($user, $pass){
        if($this->pass == $pass && $this->user == $user){
            $_SESSION['user'] = $this->user;
            $this->url_jump('index.php');
            return true;
        }else{
            return false;
        }
    }

    public function login_out(){
        session_unset();
    }

    public function check_login(){
        if(isset($_SESSION['user'])){
            return true;
        }else{
            $this->login_out();
            $this->url_jump('/login.php');
            return false;
        }
    }

    public function url_jump($url){
        header("Location:".$url);
    }
}
