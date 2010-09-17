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

class News_Model extends EA_Model
{
    var $TableName  =   'news';
    public $pk = 'id';
    public function __construct()
    {
        parent::__construct();
    }

    //獲得含內容列表的數據列表
    public function get_content_list($page_id ,$site=5,$field='id,title,tag,author,create_time,content')
        
    {
        return $this->db->select($field)
                        ->where("is_del = 0 AND page_id = $page_id ")
                        ->order_by('id DESC')
                        ->limit($site)
                        ->get($this->TableName);
    }

    

//获得列表 
    public function get_list($id,$size=5)
    {
    	$this->db->where_in('page_id',$id);
    	$this->db->select('id,title,create_time')->limit($size);
    	return  $this->db->get($this->TableName);
    }
    
    public function get_page_list($page_id,$select='id,title,create_time,content')
    {
    	if(isset($_GET['news']))
    	{
    		$info = $this->find($_GET['news'])->row();
    	}
    	else
    	{
	    	$map = array('page_id'=>$page_id,'is_del'=>0);
	    	$count = $this->db->select($select)->where($map)->count_all_results($this->TableName);
	    	$this->load->library('pagination');
	    	
			$config['total_rows'] = $count;
			$config['per_page'] = '12'; 
			
			$config['first_link'] ="第一页";
			$config['last_link'] ="最后一页";
			$config['next_link'] ="下一页";
			$config['prev_link'] ="上一页";
			$section = $this->uri->segment(2);
			$info = $this->db->select('uri')->where("id = $page_id")->get('site_page')->row();
			$config['base_url'] = site_url($info->uri);
			$seg =3;
			
			$config['uri_segment']=$seg;
			$p = $this->uri->segment($seg,0);
			$this->pagination->initialize($config);
			
			$info = $this->db->select($select)
							 ->where($map)
							 ->limit(12,$p)
							 ->order_by("id DESC")
							 ->get($this->TableName)->result();
		}
		return $info;
		
    }
    
    //单条数据，page_id下的第一条数据
    public function get_info($page_id)
    {
    	$map = array('page_id'=>$page_id,'is_del'=>0);
    	$info = $this->find($map)->row();
		return $info;					 
    }

}
