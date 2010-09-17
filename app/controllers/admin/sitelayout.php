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

class SiteLayout extends Admin_Controller
{
                           //控制器        模块                 是否应用于layout
    protected $tpl = array('index'=>array('admin/site/layout/index',true),
                           'edit' =>array('admin/site/layout/edit',true),
                           'add'  =>array('admin/site/layout/add',true));
    protected $defaultModel = 'Site_Layout_Model';
    public function __construct()
    {
        //指定默认模块
		parent::__construct();
	}
    public function beforeIndex()
    {
        
    }

    protected function siteModule()
    {
        $this->load->model('Site_Module','site');
        $ret['sitemodule'] = $this->site->lists();
        $this->load->vars($ret);
    }
    public function beforeAdd()
    {
        $_POST['edit_time'] = time();
        $_POST['account_id'] =$this->session->userdata('account_id');
        
        $this->siteModule();
    }

    public function beforeEdit()
    {
        $_POST['edit_time'] = time();
        $_POST['account_id'] =$this->session->userdata('account_id');
        $this->siteModule();
    }
    

    
}
