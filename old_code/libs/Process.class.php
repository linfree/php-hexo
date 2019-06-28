<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-13
 * Time: 21:18
 */

namespace libs;
include_once $_SERVER['DOCUMENT_ROOT'] . '/configs/config.php';

class Process{


    private $pid;
    private $command;

    public function __construct($cl = false){
        if($cl != false){
            $this->command = $cl;
            $this->runCom();
        }
    }

    private function runCom(){
        $command = 'nohup ' . $this->command . ' >  NUL 2>&1 & echo $!';
        exec($command, $op);
        print_r($command);
        $this->pid = (int)$op[0];
    }

    public function setPid($pid){
        $this->pid = $pid;
    }

    public function getPid(){
        return $this->pid;
    }

    public function status(){
        $command = 'ps -p ' . $this->pid;
        exec($command, $op);
        if(!isset($op[1]))
            return false;
        else return true;
    }

    public function start(){
        if($this->command != '')
            $this->runCom();
        else return true;
    }

    public function stop(){
        $command = 'kill ' . $this->pid;
        exec($command);
        if($this->status() == false)
            return true;
        else return false;
    }

}

$process = new Process('cd ' . BLOG_DIR . '& C:\Users\Administrator\AppData\Roaming\npm\hexo s');
var_dump($process->status());
