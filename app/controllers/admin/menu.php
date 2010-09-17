<?php

/*
 * 功能说明
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : 
*/

class Menu extends Admin_Controller
{
    protected $tpl = array('index'=>array('admin/menu/index',true),
                           'edit' =>array('admin/menu/edit',true),
                           'add'  =>array('admin/menu/add',true));
    protected $defaultModel = 'Admin_Menu';
    public function __construct()
    {
        //指定默认模块
		parent::__construct();

	}

    //列表页
    public function index(){
    	$map ="pid = 0";
    	$this->model->db->where($map);
        $this->_setPage($this->model->rowsCount());
        $list = $this->model->select('*',$map,4,$this->uri->segment(3),''.$this->model->pk.' ASC');
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
    	$this->model->db->order_by("order DESC");
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

    //修改前置
    public function beforeEdit()
    {
        $_POST['edit_time'] = time();
        $_POST['account_id']=$this->session->userdata('account_id');
    }

    //创建前置
    public function beforeAdd()
    {
        $_POST['create_time']   = time();
        $_POST['edit_time']     = time();
        $_POST['account_id']    =$this->session->userdata('account_id');
    }
   
    
}
