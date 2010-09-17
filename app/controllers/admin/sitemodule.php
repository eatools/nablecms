<?php

/*
 * 网站前台用功能模块添加
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : SiteModule.php
*/

class SiteModule extends Admin_Controller
{
                           //控制器        模块                 是否应用于layout
    protected $tpl = array('index'=>array('admin/site/module/index',true),
                           'edit' =>array('admin/site/module/edit',true),
                           'add'  =>array('admin/site/module/add',true));
                           
    protected $defaultModel = 'Site_Module';                       
    public function __construct()
    {
        //指定默认模块
		parent::__construct();
	}
    

    
}
