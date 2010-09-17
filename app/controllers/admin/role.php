<?php

/*
 * 系统角色管理
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-27 22:56 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-04-27 22:56
 * $File   : admin/role.php
*/

class role extends Admin_Controller
{

    //声明控制器模板
    protected $tpl=array(
            'index'    =>array('admin/role/index',true),
            'edit'     =>array('admin/role/edit',true),
            'add'      =>array('admin/role/add',true),
            'checkjur' =>array('admin/role/checkjur',true),
            );
    protected $defaultModel = 'Admin_Role_Model';
    public function __construct()
    {
        parent::__construct();
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
    //整理分配权限
    public function checkjur($id)
    {   
        //权限提交操作
        if($this->input->isPOST())
        {
            $where[$this->model->pk] = $id;
            $update['jur'] = serialize($this->input->post('menuid') );
            if( $this->model->update($where,$update))
            {
                 echo '{"s":"操作成功！"}';       
            }else echo '{"e":"操作失败！！"}';       
            

            return false;
        }
        //权限信息查信息
        $info = $this->model->find($id)->row();
        if(!isset($info->jur) || trim($info->jur) =='' ) $ret['jur']=array();
        else $ret['jur']  = unserialize($info->jur);
        $ret['info']=$info;

        //菜单列表
        $this->load->model('Admin_Menu','menu');
        $list = $this->menu->getMenu(array('is_del'=>'0'));
        $menu = array();
        foreach($list as &$item)  $menu[$item['pid']][] = $item;
      
        $ret['menu'] = $menu;
        $this->_view($this->tpl['checkjur'],$ret);
    }

}
