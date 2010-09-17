<?php

/*
 * 站点功能模块列表
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : site_module.php
*/

class Site_Module extends EA_Model
{
    var $TableName  =   'site_module';
    public $pk = 'id';
    public function __construct()
    {
        parent::__construct();
    }

    public function lists()
    {
        $query = $this->db->get($this->TableName);
        $ret=array();
        foreach($query->result() as $item){
            $ret[$item->module_name]=$item->title;
        }
        return $ret;
    }


}