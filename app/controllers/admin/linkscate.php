<?php

/*
 * 友情链接管理
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-05-01 04:40 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-05-01 04:40
 * $File   : linkscate.php
*/

class LinksCate extends Admin_Controller
{
                           //控制器        模块                 是否应用于layout
    protected $tpl = array('index'=>array('admin/linkscate/index',true),
                           'edit' =>array('admin/linkscate/edit',true),
                           'add'  =>array('admin/linkscate/add',true));
    protected $defaultModel = 'Links_Cate_Model';
    public function __construct()
    {
        //指定默认模块
		parent::__construct();
	}
    
    

    
}
