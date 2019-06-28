<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-10
 * Time: 22:14
 */

namespace libs;


class Request{

    # get类型
    public function get($parame, $type = 'str'){
        $parame = isset($_GET[$parame]) ? $_GET[$parame] : "";
        return $this->check_type($parame, $type);
    }

    # post类型
    public function post($parame, $type = 'str'){
        $parame = isset($_POST[$parame]) ? $_POST[$parame] : "";
        return $this->check_type($parame, $type);
    }

    # request类型
    public function request($parame, $type = 'str'){
        $parame = isset($_REQUEST[$parame]) ? $_REQUEST[$parame] : "";
        return $this->check_type($parame,$type);
    }

    # 限制类型
    private function check_type($parame, $type){
        switch ($type){
            case 'str':
                return (string)$parame;
                break;
            case 'int':
                return (int)$parame;
            default:
                return (string)$parame;
        }
    }

}