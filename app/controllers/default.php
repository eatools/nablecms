<?php

/*
 * 前台主页面
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : default.php
*/
parse_str($_SERVER['QUERY_STRING'],$_GET); 

class mydefault extends Pub_Controller
{
    protected $NowPage;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('theme');
    }
    //主操作函数
    public function index()
    {
        //模板接受的数组
        $tplData=array();
		$tplData['SITE_MEDIA'] = base_url().MEDIAPATH;
		
        
        
        $urls = $this->uri->uri_string();
        $urls = empty($urls)?'index':$urls;
        $urls = explode('/',$urls);
        if(is_array($urls)){
        foreach($urls as $k=> $v)
        {
            if(empty($v) || $v=='index'.EXT) {
                unset($urls[$k]);
                continue;
            }
            if(preg_match('/^[0-9]+$/',$v)) {
                unset($urls[$k]);
                $ret['PageNum'] = $v;
                $ret['PageUri'] = $k;
                break;
            }
        }
        }

        if(!isset($ret['PageNum']))
        {
            $ret['PageNum'] = 0;
            $ret['PageUri'] = count($urls)+1;
        }
        $urls = implode('/',$urls);
        //获得页面信息
        $this->load->model('Auto_Model','model');
        $themeInfo = $this->model->db->select('theme')
                        ->where(array('seq'=>1))
                        ->get('site_theme')
                        ->row();
                        
        define('THEMENAME' , $themeInfo->theme.'/');
        define('_THEME_',    THEMEPATH.THEMENAME);
        
        $pageInfo = $this->model->db
                          ->select('id,pid,title,tpl,cache_time,uri')
                          ->where(array('uri'=>$urls))
                          ->get('site_page')->row();
        if(empty($pageInfo))
        {
            $this->load->view(THEMENAME . 'error/404');
            return false;
        }
        $ret['pageInfo'] = $pageInfo;
        if(!empty($pageInfo->tpl))
        {
            $this->load->view(THEMENAME . $pageInfo->tpl,$ret);
        }
    }
    

}
