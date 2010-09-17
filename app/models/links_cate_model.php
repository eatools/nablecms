<?php

/*
 * 友情链接分类
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : links_cate_model.php
*/

class Links_Cate_Model extends EA_Model
{
    var $TableName  =   'links_cate';
    public $pk = 'id';
    public function __construct()
    {
        parent::__construct();
    }
    //获得以id为key的数组
    public function getIdKeyList()
    {
        $info = $this->db->select('id,title')->get($this->TableName)->result();
        $ret =array(0=>'无');    
        foreach($info as &$item)
        {
            $ret[$item->id]=$item->title;
        }
        return $ret;
    }

}