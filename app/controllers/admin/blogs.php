<?php

/*
 * 博客类型控制器 字数少
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-05-04 00:37 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-05-04 00:37
 * $File   : blogs.php
*/

class Blogs extends Admin_Controller
{
    protected $tpl = array('index'=>array('admin/blogs/index',true),
                           'edit' =>array('admin/blogs/edit',true),
                           'add'  =>array('admin/blogs/add',true));
    protected $layoutTpl = 'admin/site/work';
    protected $defaultModel = 'Blogs_Model';
    
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

    //列表
    public function index()
    {
        $url = site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3));
        $map = array('page_id'=>$this->uri->segment(3));
        $this->model->db->where($map);
        $this->_setPage($this->model->rowsCount(),10,4,$url);
        $ret['list'] = $this->model->select('id,create_time,author,is_del',$map,10,$this->uri->segment(4),$this->model->pk.' DESC');
        
        $this->_view('index',$ret);
    }

    public function beforeAdd()
    {
        $_POST['create_time'] = time();
    }
   
}
