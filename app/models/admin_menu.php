<?php

/*
 * 系统菜单
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : 
*/


class Admin_Menu extends EA_Model
{
    var $TableName='admin_menu';
    var $pk= 'id';
    public function __construct()
    {
		parent::__construct();
	}

    public function getMenu($where){
        $list = $this->db->select('id,pid,title,url,is_param')->where($where)->order_by('order desc,id DESC')->get($this->TableName);
        return $list->result_array();
    }
}