<?php

/*
 * 站点布局数据库模块
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-05-01 05:09 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-05-01 05:09
 * $File   : Site_Layout_Model.php
*/

class Site_Layout_Model extends EA_Model
{
    var $TableName  =   'site_layout';
    public $pk = 'layout_id';
    public function __construct()
    {
        parent::__construct();
    }
    /*
     *获得一个用户可用的布局列表，layout_id将作为id出现
     * @param String $select  输出字段
     * @return array
     */
    public function pkKeyList($select='layout_id,title')
    {
        $info = $this->db->select($select)->where(array('is_del'=>0))->get($this->TableName);
        $ret = array();
        foreach($info->result() as $item)
        {
            $ret[$item->layout_id]=$item;
        }
        return $ret;
    }


}