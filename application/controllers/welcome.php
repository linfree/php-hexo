<?php
use Symfony\Component\Yaml\Yaml;


class Welcome extends MpController {
      public function doIndex(){
          $value = Yaml::parseFile("D:\hexo_dir\_config.yml", Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE);
          var_dump($value);
          $con = Yaml::dump($value);
          file_put_contents("D:\hexo_dir\_config.yml2",$con);

          $hexo = new Hexo();
          var_dump($hexo->read_db()['models']['Post']);

      }
 }