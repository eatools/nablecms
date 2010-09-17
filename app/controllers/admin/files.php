<?php

/*
 * 广告信息管理
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 11:13 2010/5/8 Able Gao <ablegao@gmail.com>
 * $Edit   : 11:13 2010/5/8
 * $File   : files.php
*/

class files extends Admin_Controller
{
                           //控制器        模块                 是否应用于layout
    protected $tpl = array('index'=>array('admin/files/index',true),
                           'edit' =>array('admin/files/edit',true),
                           'add'  =>array('admin/files/add',true),
                           'pluginadd'  =>array('admin/files/pluginadd',true)
                           );
    protected $type =array('图片','视频','文件');
    public $filepath ='' ;
    protected $defaultModel ='Files_Model';
    public function __construct()
    {
        //指定默认模块
		parent::__construct();
       	$this->filepath = FCPATH.'media/upload/';
        $date = explode("-",date("Y-m-d"));
        #初始化时检查文件夹是否存在。        
        foreach($date as &$item){
            $this->filepath .="$item/";
            if(!is_dir($this->filepath)) mkdir($this->filepath);
        }
	}
	
	public function add()
	{
		if($this->input->isPOST())
		{
			$config['upload_path'] = $this->filepath;
		  	$config['allowed_types'] = 'gif|jpg|png|bmp';
		  	$config['max_size'] = '1500';
		  	$config['max_width']  = '1024';
		  	$config['max_height']  = '768';
            $config['encrypt_name'] = true;
		  	$this->load->library('upload', $config);
		  	if ( ! $this->upload->do_upload())
  			{
				$ret['repayment']['e']=$this->upload->display_errors();
		  	}else{
		  		$ret['repayment']['s']='文件上传成功！！';
		  		$data = $this->upload->data();
		  		$map =array(
		  			'title'=>$data['file_name'],
		  			'ext'=>$data['file_ext'],
		  			'create_time' => time(),
		  		);
		  		$map = $this->check_field($map);
		  		$id = $this->model->insert($map);
		  		$ret['repayment']['s']='文件上传成功！！';
		  	}
		  	$this->checkPOST($ret);
		}
		else
		{
			$this->_view($this->tpl['add']);
		}
	}
	
	
	public function pluginAdd()
	{
		$ret =array();
		if($this->input->isPOST())
		{
			$config['upload_path'] = $this->filepath;
		  	$config['allowed_types'] = 'gif|jpg|png|bmp';
		  	$config['max_size'] = '1500';
            $config['encrypt_name'] = true;		 
		  	$this->load->library('upload', $config);
		  	if ( ! $this->upload->do_upload())
  			{
				$ret['repayment']['e']=$this->upload->display_errors('','');
		  	}else{
		  		$ret['repayment']['s']='文件上传成功！！';
		  		$data = $this->upload->data();
		  		$map =array(
		  			'title'=>$data['file_name'],
		  			'ext'=>$data['file_ext'],
		  			'create_time' => time(),
		  		);
		  		$map = $this->check_field($map);
		  		$id = $this->model->insert($map);
		  		$ret['repayment']['s']='文件上传成功！！';
		  		$ret['repayment']['file'] = $data['file_name'];
                $ret['repayment']['weburl'] = date("Y/m/d/").$data['file_name'];

		  	}
		  	
		}
		$this->_view($this->tpl['pluginadd'],$ret);
	}
	
	public function beforeDelete()
	{
		if($this->input->isPOST())	
		{
			$id =	$this->uri->segment(3);
			$info = $this->model->find(array($this->model->pk=>$id))->row();
			if(file_exists($this->filepath.$info->title))
			{
				unlink($this->filepath.$info->title);
			}
		}
	
	}
	
}
