<?php

/*
 * 角色視圖
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : role_model.php
*/

class Admin_Role_Model extends EA_Model
{
    protected $TableName  =   'admin_role';
    public $pk = 'role_id';
    public function __construct()
    {
        parent::__construct();
    }

}