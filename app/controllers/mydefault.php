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
        $this->load->_ci_view_path = FCPATH . THEMEPATH;
        //模板接受的数组
        $ret=array();
        
		$ret['SITE_MEDIA'] = base_url().MEDIAPATH;
		//自动处理类
        $this->load->model("Auto_Model");
        
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
        if(empty($urls)) $urls='index';
        $ret['SelfURI'] = $urls;
        //获得页面信息
        $this->load->model('Site_Theme_Model','theme_set');
        
                        
        define('THEMENAME' , $this->theme_set->getThemeDir().'/');
        define('_THEME_',    THEMEPATH.THEMENAME);

        $this->load->model('site_page_model',"SitePage");
        $pageInfo = $this->SitePage->getInfoOnUri($urls);
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
