<?php

/*
 * 站点布局控制器
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-05-01 04:40 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-05-01 04:40
 * $File   : sitelayout.php
*/

class SiteTheme extends Admin_Controller
{
                           //控制器        模块                 是否应用于layout
    protected $tpl = array(
                'index'=>array('admin/site/theme/index',true),
                'edit' =>array('admin/site/theme/edit',true),
                );
    protected $defaultModel = 'Site_Theme_Model';
    public function __construct()
    {
        //指定默认模块
		parent::__construct();
        

	}
    public function index()
    {
        $handle = opendir(FCPATH . THEMEPATH );
        $list ='';
        while( false !== ($file = readdir($handle) ) )  
        {
            if (!in_array($file,array('.','..'))) {
                $list[]=array( $file , include(FCPATH . THEMEPATH . $file.'/__init__.php') ) ;
            }
        }
        $info  = $this->model->find(array('seq'=>1))->row();
        $this->_view('index',array('themelist'=>$list   ,  'use_theme'=>$info->theme ));
    }
    
    //应用模版
    public function usetheme($themeName)
    {
        $flag = $this->model->update(array('seq'=>1),array('theme'=>$themeName));
        if($flag)
        {
            echo '{"s":"模版更换成功！"}';
        }
        else
        {
            echo '{"e":"模版更换失败！"}';
        }
    }


    //编辑模版
    public function edit($themeName)
    {

        
        $conf = include(FCPATH . THEMEPATH . $themeName.'/__init__.php');
        if(is_writable(FCPATH . THEMEPATH . $themeName)) $conf['iswritable'] = true;
        else $conf['iswritable'] = false;
        if($this->input->isAjax() )
        {
            switch($this->input->post('type'))
            {
                //获取模版信息
                case 'getFile':
                    $ret['id']      = $this->input->post('name');
                    $url            = FCPATH . THEMEPATH . $themeName."/".$ret['id'] ;
                    if(!file_exists($url))
                    {
                        echo '{"e":"文件不存在！"}';
                    }
                    else
                    {
                        
                        $ret['closeFile'] = $this->session->userdata('lastEditThemeFile');
                        $ret['text']    = file_get_contents($url);
                        $ret['syntax']  = 'php';
                        $ret['s']       = '获取成功！';
                        
                        $this->session->set_userdata('lastEditThemeFile',$this->input->post('name'));

                        echo json_encode($ret);
                    }
                    
                break;
                //保存模版信息
                case 'saveFile':
                    $url            = FCPATH . THEMEPATH 
                                    . $themeName."/"
                                    . $this->session->userdata('lastEditThemeFile');
                    if(is_writable($url))
                    {
                        $f = fopen($url,'w+');
                        fwrite($f,$_POST['content']);
                        fclose($f);
                        echo '{"s":"文件修改成功!' 
                            . $this->session->userdata('lastEditThemeFile')
                            . '"}';

                    }
                    else echo '{"e":"文件权限错误或文件不存在！"}';
                    
                break;
            }

        }else {
            define('__THEMENAME__', $themeName.'/');
            $list ='';
            
            function redDir($url,$list='')
            {

                $handle = opendir(FCPATH . THEMEPATH . __THEMENAME__ . $url);
                while( false !== ($file = readdir($handle) ) )  
                {
                    if (!in_array($file,array('.','..'))) {
                        if(is_dir(FCPATH . THEMEPATH . __THEMENAME__ . $url."/".$file)){
                            
                            redDir($url.'/'.$file,& $list);
                        }else
                        {
                            $list[]=$url.'/'.$file;
                        }
                    }
                }

            }

            redDir('',&$list);

            $conf['file_list'] = $list;

            $this->_view('edit',$conf);
        }
    }
    
    //获取模版中的文件信息
    public function theme_file()
    {
       $url = implode('/',$this->uri->uri_to_assoc(3));
       
       $file = file_get_contents(FCPATH . THEMEPATH .$url);
       echo $file;
    }

}
