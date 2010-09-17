<?php

/*
 * 新闻管理控制器
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-05-04 00:37 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-05-04 00:37
 * $File   : news.php
*/

class Photos extends Admin_Controller
{
    protected $tpl = array('index'=>array('admin/photos/index',true),
                           'edit' =>array('admin/photos/edit',true),
                           'add'  =>array('admin/photos/add',true));
    protected $layoutTpl = 'site/work';
    protected $defaultModel = 'Photos_Model';
    
    public function __construct()
    {
        //指定默认模块
		parent::__construct();
	}


    //默认模版变量
    protected function setDefaultTplData()
    {
       $this->load->model('Site_Page_Model','sitepagemodel');
       $data['page_list'] = $this->sitepagemodel->getPidList();
       $this->load->model('Site_Theme_Model','si');
       $data['siteThemeConf'] = $this->si->getThemeConf();
       return $data;
    }

    //新闻列表
    public function index()
    {
        $url = site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
        $map = array('page_id'=>$this->uri->segment(3));
        $this->model->db->where($map);
        $this->_setPage($this->model->rowsCount(),10,4,$url);
        $ret['list'] = $this->model->select('id,title,create_time,author,is_del',$map,10,$this->uri->segment(4),$this->model->pk.' DESC');
        
        $this->_view('index',$ret);
    }

    public function beforeAdd()
    {
        $_POST['create_time'] = time();
    }

    public function beforeEdit()
    {
        $_POST['create_time'] = time();
    }


   
}
