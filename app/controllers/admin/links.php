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
 * $File   : links.php
*/

class links extends Admin_Controller
{
                           //控制器        模块                 是否应用于layout
    protected $tpl = array('index'=>array('admin/links/index',true),
                           'edit' =>array('admin/links/edit',true),
                           'add'  =>array('admin/links/add',true));
    protected $defaultModel ='Links_Model';
    
    public function __construct()
    {
         
        //指定默认模块
		parent::__construct();
       
	}
     //index修改
    public function beforeIndex()
    {
        $this->load->model('Links_Cate_Model','linkCate');
        $ret['linkscateList'] = $this->linkCate->getIdKeyList();
        $this->load->vars($ret);
    }

    //前置添加
    public function beforeAdd()
    {
        $this->load->model('Links_Cate_Model','linkCate');
        $ret['linkscateList'] = $this->linkCate->getIdKeyList();
        $this->load->vars($ret);
    }


    //前置修改
    public function beforeEdit()
    {
        $this->load->model('Links_Cate_Model','linkCate');
        $ret['linkscateList'] = $this->linkCate->getIdKeyList();
        $this->load->vars($ret);
    }
    
    

    
}
