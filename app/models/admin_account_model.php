<?php

/*
 * 系统用户表
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : admin_account_model.php
*/

class Admin_Account_Model extends EA_Model
{
    public $TableName  =   'admin_account';
    public $pk = 'account_id';
    public function __construct()
    {
        parent::__construct();
    }

 //用户登录处理函数
    public function login($user,$pass,$ip)
    {
        $map = array('username'=>$user,'passwd'=>md5($pass),'is_del'=>0);
        $query = $this->db->where($map)->get($this->TableName);
        if($query->num_rows()>0 )
        {
            $row = $query->row();
            $this->db->login_time = time();
            $this->db->login_ip   = ip2long($ip);
            $logincount=$row->logincount+1;
            $data=array('login_time'=>time(),'login_ip'=>ip2long($ip),'logincount'=>$logincount );

            $this->db->where(array('account_id'=>$row->account_id))->update($this->TableName,$data);
            return $row;
            

        }else{
            return false;
        }
    }
}