<?php

/*
 * 新闻管理模块
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : site_module.php
*/

class Links_Model extends EA_Model
{
    var $TableName  =   'links';
    public $pk = 'id';
    public function __construct()
    {
        parent::__construct();
    }

    public function getList($field = 'title,url,target',$map='' ,$order ="id ASC")
    {
        if(!empty($field)) $this->db->select(trim($field));
        if(!empty($map)) $this->db->where($map);
        if(!empty($order)) $this->db->order_by($order);
        return $this->db->get($this->TableName);
    }

}
