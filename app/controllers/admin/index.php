<?php

/**
 * 科目信息管理
 * ============================================================================
 * 版权所有 (C) 2005-2009 北京格特资优网络技术有限公司，并保留所有权利。
 * 网站地址: www.ziyouedu.com
 * ============================================================================
 * $Version: v1.0.0 Beta
 * $Author: Able Gao <ablegao@gmail.com> $
 * $Date: 2009-12-7 11:58 $
 * $Id: controller/admin/index.php 2009-12-7 11:58 Able Gao $
*/
class Index extends Controller
{
	public function __construct()
    {
		parent::__construct();
        
	}

    //默认操作界面
    public function index()
    {
        if($this->session->userdata('account_id')==false){
            redirect(site_url(ADMIN_ROUTES."/login"));
            return false;
        }

        //系统菜单获取  --------------------------------------------------------------
        $this->load->model('Admin_Menu','menu');
        
        if($this->session->userdata('is_super') == '1' 
               ## && is_array($this->session->userdata('menu')) 
               ## &&  count($this->session->userdata('menu'))<=0
               )
        {
            //权限菜单
            $list = $this->menu->getMenu(array('is_del'=>'0','is_param'=>'0'));
        }
        else
        {
            //权限菜单
            $this->load->model('Admin_Role_Model','role');
            //处理查询条件
            $this->role->db->where_in('role_id',$this->session->userdata('role'));
            $rolelist = $this->role->select('jur',array('is_del'=>0 ));

            $menuId = array();
            foreach($rolelist->result() as $menuItem){
                $array = unserialize($menuItem->jur);
                $menuId = array_merge($menuId,$array);
            }
            
            $menuId = array_unique($menuId);
            
            $this->menu->db->where_in('id',$menuId);
            $list = $this->menu->getMenu(array('is_del'=>'0'));
        }


        $menu = array();
        
        $jur =array(); //权限搜集
        foreach($list as &$item) 
        {
            //收集可访问权限地址
            $jur[]=$item['url'];

            if($item['is_param']==0)
            {
                //构造访问列表
                $item['url'] =site_url(ADMIN_ROUTES.'/'.$item['url']);
                $menu['m_'.$item['pid']][] = $item;
            }
            
        }
        $ret['menu'][] = $menu;   
        
        //系统菜单获取 end  --------------------------------------------------------------
       

        $this->load->view('admin/layout',$ret);
        $this->session->set_userdata('jur',$jur);
    }

    public function notAccess()
    {
        $this->load->view('header');
        $this->load->view('not_access');
    }
    
    //登录界面
    public function login()
    {
        $this->load->model('Admin_Account_Model','account',true);
        if($this->input->isPOST())
        {
            if ($this->input->post('checkcode')!= $this->session->userdata('checkcode')){
                echo '{"e":"验证码不正确！"}';
                return false;
            }
            $flag = $this->account->login(  $this->input->post('username'),
                                            $this->input->post('pass'),
                                            $this->input->ip_address()
                                        );
            if($flag)
            {
                $arr = array(
                    'account_id'        =>$flag->account_id,    
                    'username'          =>$flag->username,
                    'last_login_time'   =>$flag->login_time,
                    'last_login_ip'     =>$flag->login_ip,
                    'login_time'        =>time(),
                    'login_ip'          =>$this->input->ip_address(),
                    'is_super'          =>$flag->is_super,
                    'role'              =>$flag->role,
                );
                $this->session->set_userdata($arr);
                echo '{"s":"登录成功！准备进入...","u":"'.site_url(ADMIN_ROUTES).'"}';
            }else{
                //echo $this->account->db->last_query();
                echo '{"e":"登录失败"}';
            }
        }else $this->load->view('admin/index/login');
    }
    //退出界面
    public function loginout()
    {
        $this->session->unset_userdata();

        redirect(ADMIN_ROUTES.'/login');
    }

}
