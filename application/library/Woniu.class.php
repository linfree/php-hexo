<?php
class Woniu {
    function say(){
        $Woniu=&getInstance();
        echo 'application folder is:'.$Woniu::$system['application_folder'].'<br/>';
        echo 'Hello,MicroPHP!';
    }
} 
