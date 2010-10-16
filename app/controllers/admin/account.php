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

class account extends Admin_Controller
{
                           //控制器        模块                 是否应用于layout
    protected $tpl = array('index'=>array('admin/account/index',true),
                           'edit' =>array('admin/account/edit',true),
                           'editmy' =>array('admin/account/editmy',true),
                           'add'  =>array('admin/account/add',true));
    protected $defaultModel ='Admin_Account_Model';
    public function __construct()
    {
		parent::__construct();
	}
     ////修改信息
    public function beforeAdd()
    {
        //$_POST['passwd'] = md5($_POST['passwd']);
    }

    public function editmy()
    {
        if($this->input->isPOST())
        {	$map = array('account_id'=>$_POST['account_id']);
            $flag = $this->model->update($map,$_POST);
            if($flag)
            {
            echo '{"s":"信息修改成功！"}';
            }
            else
            {
            	echo '{"e":"修改失败~！"}';
            }
            return true;
        }
        $ret['account_id'] = $this->session->userdata('account_id');
        $ret['info'] = $this->model->find($ret['account_id'])->row();
        $this->_view($this->tpl['editmy'],$ret);
    
    }

    //修改信息
    public function beforeEdit()
    {

         $this->load->vars($this->roleList());
    }

    //生成角色列表<BR>
    private function roleList()
    {
        $this->load->model('Admin_Role_Model','role');
        $info = $this->role->select('role_id,title',array('is_del'=>0));
        $ret['role_list'] = $info->result();
        return $ret;
    }
    


    //系统用户修改密码
    public function changepass()
    {
        if($this->input->isPOST())
        {
            if($_POST['passwd']==$_POST['dbpasswd'] && trim($_POST['passwd'])!='')
            {
                $this->model->update(array('account_id'=>$_POST['account_id']),array('passwd'=>md5($_POST['passwd']) ));
                echo '{"s":"密码修改成功！"}';
            }
            else
            {
                echo '{"e":"密码填写错误！"}';
            }

        }
    }

    //修改个人密码
    public function changepassofmy()
    {
        if($this->input->isPOST())
        {
            if($_POST['passwd']==$_POST['dbpasswd'] && trim($_POST['passwd'])!='')
            {
            	$map = array('account_id'=>$this->session->userdata('account_id'),'passwd'=>md5($_POST['oldpasswd']) );
            	$this->db->where($map);
            	$rowCont = $this->model->rowsCount();
            	if($rowCont<=0) {
            		echo '{"e":"密码修改失败！原始密码错误！！"}';
            		return false;
            	}
                $flag = $this->model->update($map,array('passwd'=>md5($_POST['passwd']) ));
                echo '{"s":"密码修改成功！"}';
               
            }
            else
            {
                echo '{"e":"密码格式填写错误！请确保确认密码与新密码相同，并且不能为空！"}';
            }

        }

    }


    //编辑角色
    public function checkrole()
    {
        if($this->input->isPOST())
        {
            $role= $this->input->post('role_id');
            if(!is_array($role)) $role = array();
            $role = implode(',',$role);
            if($this->model->update(array('account_id'=>$_POST['account_id']),
                                    array('role'=>$role)))
            {
                echo '{"s":"操作成功！！"}';
            }
            else
            {
                echo '{"e":"操作失败！！"}';
            }
        }
    }

    
}
