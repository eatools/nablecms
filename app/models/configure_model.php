<?php

/*
 * 配置管理模块
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : configure_module.php
*/

class Configure_Model extends EA_Model
{
    var $TableName  =   'configure';
    public $pk = 'id';
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * 根据code获取value
     * @param String $code
     */
    public function getValue($code)
    {
        $this->db->cache_on();
        $info = $this->find(array("code"=>$code),'value');
        return $info->row();

    }
}
