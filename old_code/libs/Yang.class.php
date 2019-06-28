<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-10
 * Time: 21:51
 */

namespace libs;

include_once '/configs/config.php';

class Yang extends User{
    public $pass = '123123';
    public $user = 'admin';

    public function __construct(){
        session_start();
    }

}
