<?php

/*
 *　模型扩展类
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-26 00:00 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-04-26 00:00
 * $File   : ea_model.php
*/

if ( !  defined('BASEPATH')) exit('No direct script access allowed');
class EA_Model extends Model 
{
    var $pk ='id';
    public function __construct()
    {
		 parent::Model();

	}
	


    /**
     * 数据信息查找
     * @param array     $map                查找条件
     * @param string    $field              查找字段　
     * @param int       $limit  default 0   开始查找位置
     * @param int       $offset default 20  偏移数
     * @return query
     */
    public function select($field='*',$map='',$offset='',$limit=0,$order='')
    {

        $this->db->select($field);
        if (!empty($offset)) $this->db->limit($offset,$limit);
     	if(!empty($order)==true)  $this->db->order_by($order);
        if ($map!='') $query = $this->db->get_where($this->TableName, $map);
        else $query = $this->db->get( $this->TableName );
        return $query;
    }

    public function rowsCount()
    {
        return $this->db->count_all_results($this->TableName);
    }
    

    /**
     * 通用插入
     * @param array $map 插入数据
     * @return query
     */
    public function insert($map)
    {
        $query = $this->db->insert($this->TableName,$map);
        return $query;
    }

    /**
     * 通用更新
     * @param array $where 更新条件
     * @param array $data   数据变动
     * @return query
     */
    public function update($where,$data)
    {
        $query = $this->db->where($where)->update($this->TableName,$data);
        return $query;
    }

    /**
     * 通用删除
     * @param array $where 删除条件
     * @return query
     */
    public function delete($where)
    {
        $query = $this->db->delete($this->TableName,$where);
        return $query;
    }

    //获得字段
    public function fields()
    {
        return  $this->db->list_fields($this->TableName);
    }

    //查找单条信息
    public function find($where,$field='*',$order='')
    {
        if(!is_array($where)) $where = array($this->pk=>$where);
        $this->db->select($field);
        if(!empty($order)) $this->db->order_by($order);
        $info =  $this->db->where($where)->get($this->TableName);
        return $info;
    }
    
    public function get()
    {
    	$this->db->get($this->TableName);
    }
}
