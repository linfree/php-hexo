<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-01-15
 * Time: 21:58
 */
include_once 'configs/config.php';
$res = new \libs\Request();

$hexo = new \libs\Hexo();
if($res->get('do') === 'start'){
    $hexo->server();
}

$do = $res->get('do');

$obj = $res->get('obj');

if($obj == 'hexo'){
    switch ($do){
        case 'start':
            $hexo->server();
            break;
        case 'stop':
            $hexo->kill_server();
            break;
        case 'deploy':
            $hexo->deploy();
            break;
        case 'status':
            $result = $hexo->find_server();
            if($result){
                echo json_encode(array("status" => "alive", "code" => (int)$result));
            }else{
                echo json_encode(array("status" => "die", "code" => 0));
            }

            break;
        case 'clear':
            $hexo->clear();
            break;
    }
}elseif($obj == 'blog'){
    $tittle = $res->request('tittle');
    if($tittle === ''){
        return_404();
    }

    switch ($do){
        case 'new':
            $blog = new \libs\Blog($tittle, true);
            break;
        case 'del':
            $type = $res->get('type');
            $blog = get_blog($type, $tittle);
            return ($blog->remove());
            break;
        case 'modify_status':
            $type = $res->get('type');
            $new_status = $res->get('new_status');
            if($new_status === ''){
                return_404();
            }
            $blog = get_blog($type, $tittle);
            return ($blog->modifi_status($new_status));
            break;
        case 'rename':
            $type = $res->get('type');
            $new_name = $res->get('new_name');
            if($new_name === ''){
                return_404();
            }
            $blog = get_blog($type, $tittle);
            return ($blog->rename($new_name));
            break;

    }
}


function get_blog($type, $tittle){
    if($type == '' || $tittle == ''){
        return_404();
    }else{
        $filename = \libs\Blog::typetittle_to_filename($type, $tittle);
        $blog = new \libs\Blog($filename);
        return $blog;
    }
}

?>
