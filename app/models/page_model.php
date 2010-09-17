<?php

/*
 * 页面
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : page_model.php
*/


class Page_Model extends Ea_Model
{
    public $TableName="site_page";
    public $pk = 'id';
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getTop($pid=0)
    {
       $info = $this->db->select('id,title,uri')
             ->where("is_del = 0 AND pid = $pid ")
             ->order_by('orderby DESC,id ASC')
             ->get($this->TableName)->result();    
       return $info;
    }
    
    //获得主分类标题名称。
    public function getPageName($pageid)
    {
    	$info = $this->find($pageid,'id,pid,title,uri')->row();
    	if($info->pid>0) $name = $this->getPageName($info->pid);
    	else $name = $info;
    	return $name;
    }
    //分级分类列表
    public function secondMenu($pageid)
    {
    	$info = $this->find($pageid,'id,pid')->row();
    	return (!empty($info) && $info->pid>0) 
    			? $this->getTop($info->pid)
    			: $info = $this->getTop($info->id);
    }
    //下级分类
    public function getNextPage($page_id)
    {
    	$info = $this->find(array('pid'=>$page_id),'id,pid,title',"orderby DESC,id ASC")->row();
    	return $info;
    }

    public function get_list($pid=null){

        $where = "is_del = 0 ";
        if(!empty($page_id)) $where.=" AND pid =$pid ";
        $info = $this->db->select('id,title,uri,edit_time')
             ->where($where)
             ->order_by('orderby DESC,id ASC')
             ->get($this->TableName)->result();    
       return $info;
    
    }

}