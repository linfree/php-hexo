<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-13
 * Time: 19:55
 */

namespace libs;
include_once $_SERVER['DOCUMENT_ROOT'] . '/configs/config.php';

class Hexo{

    public $hexo_exe = '';
    public $pid = '';
    protected $os = 'win';

    public function __construct(){
        $this->hexo_exe = HEXO_DIR;
        if(!$this->check_hexo()){
            die('还未安装hexo或hexo程序位置填写错误');
        }
        $this->get_os();
    }

    /**
     * 获取操作系统是win还是linux
     * @return string
     */
    protected function get_os(){
        $this->os = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? 'win' : 'linux';
        return $this->os;
    }


    /**
     * 新建一个博客
     * @param $blog_name
     * @return bool
     */
    public function new_blog($blog_name){
        $cmd = 'cd ' . BLOG_DIR . '&& ' . $this->hexo_exe . ' new ' . $blog_name;
        return $this->exec_cmd($cmd);
    }

    /**
     * 判断hexo是否安装成功;
     * @return bool
     */
    public function check_hexo(){
        $cmd = $this->hexo_exe . ' version 2>&1';
        if($this->exec_cmd($cmd)){
            return true;
        };
    }


    public function clear(){
        if($this->os === 'win'){
            $cmd = $this->hexo_exe . ' --cwd ' . BLOG_DIR . ' clean > nul 2>&1 &';
        }else{
            $cmd = 'cd ' . BLOG_DIR . '&&nohup ' . $this->hexo_exe . ' clean > /dev/null 2>&1 &';
        }
        var_dump($cmd);
        return $this->exec_cmd($cmd);
    }

    /**
     * 部署项目
     * @return bool
     */
    public function deploy(){
        if($this->os === 'win'){
            $cmd = $this->hexo_exe . ' --cwd ' . BLOG_DIR . ' d -g 2>&1 &';
        }else{
            $cmd = 'nohup ' . $this->hexo_exe . ' --cwd ' . BLOG_DIR . ' deploy -g > /dev/null 2>&1 &';
        }
        var_dump($cmd);
        #$cmd = 'echo %path% 2>&1';
        return $this->exec_cmd($cmd);
    }

    /**
     * 启动测试服务
     * @return bool
     */
    public function server(){
        if($this->find_server()){
            return true;
        }else{
            if($this->os === 'win'){
                $cmd = $this->hexo_exe . ' --cwd ' . BLOG_DIR . ' server -g > nul 2>&1 &';
            }else{
                $cmd = 'cd ' . BLOG_DIR . '&&nohup ' . $this->hexo_exe . ' server -g > /dev/null 2>&1 & echo $!';
            }
            print_r($cmd);
            return $this->exec_cmd($cmd);
        }
    }

    /**
     * 执行系统命令
     * @param $command
     * @return bool
     */
    public function exec_cmd($command){
        if(!function_exists('exec')){
            die('这个主机目前不支持exec,请启用exec支持');
        }
        exec($command, $output, $return_val);
        var_dump($output);
        return $return_val == 0 ? $output : false;
    }


    /**
     * windows 查找服务的pid
     * @return mixed
     */
    public function find_server(){
        if($this->os === 'win'){
            $cmd = 'netstat -aon | findstr 0.0.0.0:4000';
        }else{
            $cmd = 'netstat -anp | grep 0.0.0.0:4000 | awk \'{print $7}\'';
        }
        if($res = $this->exec_cmd($cmd)[0]){
            if($this->os === 'win'){
                $res = explode(' ', $res);
                $pid = end($res);
            }else{
                $pid = explode('/', $res)[0];
            }
            $this->pid = $pid;
            return $this->pid;
        }else{
            $this->pid = '';
            return false;
        }
    }

    public function kill_server(){
        $this->find_server();
        if($this->pid != ''){
            if($this->os === 'win'){
                $cmd = "taskkill /F /PID {$this->pid}";
            }else{
                $cmd = "kill {$this->pid}";
            }
            $this->exec_cmd($cmd);
            $this->pid = '';
        }else{

            return 'pid is null';
        }
    }


}

//$hexo_client = new Hexo();
//#var_dump($hexo_client->server());
//#sleep(10);
//$pid = $hexo_client->find_server();
//var_dump($pid);
//$hexo_client->kill_server();
//#$hexo_client->deploy();