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

class News extends Admin_Controller
{
    protected $tpl = array('index'=>array('admin/news/index',true),
                           'edit' =>array('admin/news/edit',true),
                           'add'  =>array('admin/news/add',true));
    protected $layoutTpl = 'admin/site/work';
    protected $defaultModel = 'News_Model';
    
    public function __construct()
    {
        //指定默认模块
		parent::__construct();
        $data =array();

        //获取通用数据
        #$this->load->model('Site_Layout_Model','sitelayout');
        #$data['site_layout'] = $this->sitelayout->pkKeyList('layout_id,title,admin_module');
        #$this->layout->setData($data);
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

    public function index($cateid)
    {
        $ret['cateid'] = $cateid;
        $url = site_url($this->uri->uri_string);
        $map = array('page_id'=>$cateid);
        $this->model->db->where($map);
        $this->_setPage($this->model->rowsCount(),10,$url);
        $ret['list'] = $this->model->select('id,title,create_time,author,is_del',$map,10,
                $_GET["per_page"],$this->model->pk.' DESC');
        
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
