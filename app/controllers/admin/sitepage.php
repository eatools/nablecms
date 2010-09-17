<?php

/*
 * 站点页面控制器
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-05-01 04:40 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-05-01 04:40
 * $File   : pagesite.php
*/

class SitePage extends Admin_Controller
{
                           //控制器        模块                 是否应用于layout
    protected $tpl = array('index'=>array('admin/site/page/index',true),
                           'work'=>array('admin/site/page/work',true),
                           'edit' =>array('admin/site/page/edit',true),
                           'add'  =>array('admin/site/page/add',true));
    protected $defaultModel = 'Site_Page_Model';
    public function __construct()
    {
         
        //指定默认模块
		parent::__construct();
	}
    // 设置通用模版变量
    protected function setDefaultTplData()
    {
        $this->load->model('Site_Theme_Model','si');
        $ret['siteThemeConf'] = $this->si->getThemeConf();
        return $ret;
    }
    //标准工作目录
    public function work()
    {
        $this->layoutTpl = 'admin/site/work' ;
        
        $list = $this->model->select('id,pid,title,controller',array('is_del'=>0),15,$this->uri->segment(3),'orderby DESC,id ASC');
        $pidArr = array();
        foreach($list->result() as $item)
        {
            $pidArr[$item->pid][]=$item;
        }
        
        $ret['page_list'] = $pidArr;

        $this->_view($this->tpl['work'],$ret);
    }

    
    //列表页
    public function index(){
    	$map ="pid = 0";
    	$this->model->db->where($map);
        $this->_setPage($this->model->rowsCount());
        $list = $this->model->select('*',$map,'','','orderby desc,'.$this->model->pk.' ASC');
        $arr = array();
        foreach($list->result() as $item)
        {
        	$arr[]=$item;
        	$this->get_next_list($item->id,&$arr,'&nbsp;&nbsp;&nbsp;&nbsp;');
        }        
        $ret['list'] =    $arr;
        $this->_view($this->tpl['index'],$ret);
        $this->load->view('admin/page');
    }
    //菜单循环
    public function get_next_list($pid,&$arr,$par='')
    {
    	$map ="pid = $pid ";
    	$this->model->db->order_by("orderby DESC");
    	$list = $this->model->select('*',$map)->result();
    	
    	if(!is_array($list)) return false;
    	$par .= "&nbsp;&nbsp;&nbsp;&nbsp;";
    	foreach($list as &$item)
        {
        	$item->title=$par.'|-'.$item->title;
        	$arr[]=$item;
        	$this->get_next_list($item->id,&$arr,$par);
        }
        return true;
    }
    

    public function beforeAdd()
    {
        $_POST['edit_time'] = time();
        $_POST['account_id'] =$this->session->userdata('account_id');
    }

    public function beforeEdit()
    {
        $_POST['edit_time'] = time();
        $_POST['account_id'] =$this->session->userdata('account_id');
    }
    
}
