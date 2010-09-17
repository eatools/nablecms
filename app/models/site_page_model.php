<?php

/*
 * 站点功能模块列表
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-05-01 05:09 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-05-01 05:09
 * $File   : Site_Page_Model.php
*/

class Site_Page_Model extends EA_Model
{
    public $TableName  =   'site_page';
    public $pk = 'id';
    public function __construct()
    {
        parent::__construct();
    }
    public function getList()
    {
        
    }

    public function getPageAdminModule()
    {
        
    }
    
    //获得以pid为键名的数组
    public function getPidList()
    {
    
        $list = $this->select('id,pid,title,controller',array('is_del'=>0),'','','orderby DESC,id ASC');
        $pidArr = array();
        foreach($list->result() as $item)
        {
            $pidArr[$item->pid][]=$item;
        }
        return $pidArr;
    }
    //获得以ID为key的列表
    public function getIdKeyList()
    {
    	$list = $this->select('id,title',array('is_del'=>0),'','','orderby DESC,id ASC');
    	$idArr = array();
        foreach($list->result() as $item)
        {
            $idArr[$item->id]=$item->title;
        }
        return $idArr;
    
    }
    //根据uri字段查询处一条数据
    public function getInfoOnUri($uri)
    {
        $this->db->cache_on();
        $info  = $this->find(array('uri'=>$uri),'id,pid,title,tpl,cache_time,uri')->row();
        return $info;
    }

}
