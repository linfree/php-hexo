<?php
/**
 * Created by PhpStorm.
 * User: Linfree
 * Date: 2019-07-15
 * Time: 23:32
 */

class Edit extends MpController
{
    /**
     * 新建博客
     */
    public function doNew()
    {

        $name = $this->input->post('newname', null, true);
        if (substr($name, -3) == ".md") {
            $name = substr($name, 0, strlen($name) - 3);
        }
        $re = '/[`~!@#$%^&*()_|+=?;:\'",.<>\{\}\[\]\\\\\/\s]/i';
        $name = preg_replace($re, '', $name);


        $content = $this->input->post('content');
        $filename = BLOG_DIR . '/' . HConfig::get('source_dir') . '/_posts/' . $name . '.md';


        if (FileManage::check_file_exists($filename) || $name == '') {
            return $this->ajax_echo(0, '文件重复', 'exists');
        } else {
            FileManage::write_content($filename, $content, true);
            return $this->ajax_echo(1, '保存成功', 'success');
        }
    }

    /**
     * 编辑博客
     */
    public function doEdit($name, $type = 'post')
    {
        $re = '/[`~!@#$%^&*()_|+=?;:\'",<>\{\}\[\]\\\\\/\s]/i';

        $oldname = preg_replace($re, '', $this->input->post('oldname')) . '.md';
        $newname = preg_replace($re, '', $this->input->post('newname')) . '.md';
        $content = $this->input->post('content');

        $oldfile = ParseBlog::parse($oldname, $type)['full_dir'];
        $newfile = dirname($oldfile) . '/' . $newname;

        if($oldname !== $newname){
            if(FileManage::check_file_exists($newfile) || $newname === '.md'){
                return $this->ajax_echo(0, "文件已存在", 'error');
            }else{
                FileManage::mv_file($oldfile, $newfile);
            }
        }

        $res = FileManage::write_content($newfile, $content);
        if($res){
            return $this->ajax_echo(1, "编辑成功", array("newname"=>$newname,"type"=>$type));
        }else{
            return $this->ajax_echo(0, "没有写入成功", "error");
        }

    }


    public function doDel($name,$type = 'post')
    {
        $re = '/[`~!@#$%^&*()_|+=?;:\'",<>\{\}\[\]\\\\\/\s]/i';

        $name = preg_replace($re, '', $name) ;
        $content = ParseBlog::parse($name, $type);
        $filedir = $content['full_dir'];

        if($content['layout']=='recycle'){
            $res = unlink($filedir);
            if($res){
                return $this->ajax_echo(1,"已经彻底删除文件",'success');
            }else{
                return $this->ajax_echo(0,"删除文件失败",'error');
            }
        }else{
            $recycle_dir = BLOG_DIR.'/'.HConfig::get("source_dir").'/_recycle/';

            if(!is_dir($recycle_dir)){
                if(!mkdir($recycle_dir,0755)){
                    return $this->ajax_echo(0,"创建回收站失败",'error');
                };
            }
            FileManage::mv_file($filedir, $recycle_dir . $content['filename']);
            return $this->ajax_echo(1,"文件已经移到回收站",'success');
        }

    }

}