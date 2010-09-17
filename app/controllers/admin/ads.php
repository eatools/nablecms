<?php

/*
 * 广告信息管理
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 11:13 2010/5/8 Able Gao <ablegao@gmail.com>
 * $Edit   : 11:13 2010/5/8
 * $File   : ads.php
*/

class ads extends Admin_Controller
{
                           //控制器        模块                 是否应用于layout
    protected $tpl = array('index'=>array('admin/ads/index',true),
                           'edit' =>array('admin/ads/edit',true),
                           'add'  =>array('admin/ads/add',true));
    protected $defaultModel ='Ads_Model';
    public function __construct()
    {
         
        //指定默认模块
		parent::__construct();
       
	}
	//以站点页面为id的列表
	protected function getSitePageList()
	{
		$this->load->model('Site_Page_Model','sitepage');
       	return  $this->sitepage->getIdKeyList();
	}
     //index修改
    public function beforeIndex()
    {
        $ret['pageList'] = $this->getSitePageList();
        $this->load->vars($ret);
    }
    

    //前置添加
    public function beforeAdd()
    {
        $ret['pageList'] = $this->getSitePageList();
        $this->load->vars($ret);
    }


    //前置修改
    public function beforeEdit()
    {
    	$ret['pageList'] = $this->getSitePageList();
        $this->load->vars($ret);
    }
    
    
}
