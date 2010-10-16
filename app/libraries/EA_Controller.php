<?php

/*
 * 控制器
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : ea_controller.php
*/

parse_str($_SERVER['QUERY_STRING'],$_GET);
if(!isset($_GET["per_page"])) $_GET['per_page']='';

class EA_Controller extends Controller{
    public function __construct(){
        parent::__construct();
	    $this->load->library('parser');
    }
    
    /*
     * ----------------------------------------
     *  重构读取规则
     * ----------------------------------------
     * 增加前置函数 (before[METHOD]),后置函数(afterMethod)
     */
    public function _remap($method)
    {
        if (!method_exists($this,$method))
        {
            show_404("{$this}/{$method}");
        }
        $beforeMethod = "before$method";
        $afterMethod = "after$method";
        if (method_exists($this,$beforeMethod)) $this->$beforeMethod();
        call_user_func_array(array($this, $method), array_slice($this->uri->rsegments, 2));
        if (method_exists($this,$afterMethod)) $this->$afterMethod();
    }

    /*
     * ----------------------------------------
     *  分页设置
     * ----------------------------------------
     * 
     */
    protected function _setPage($count,$prePage=14,$base_url=''){
        ##页处理
        if(empty($base_url))
        {
            $seg = $this->uri->rsegments;
            if($this->uri->segment(1) == ADMIN_ROUTES) $seg[0] = ADMIN_ROUTES;
            ksort($seg);
            $base_url = site_url(implode("/",$seg));
        }
        $config['base_url'] =$base_url."?";
        $config['num_links'] = 12;
        $config['total_rows'] = $count;
        $config['per_page'] = $prePage; 
        #$config['uri_segment']=$urisegment;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        
        $this->load->library('pagination');
        
        $this->pagination->initialize($config); 
    }
}




/*
 * 后台管理通用控制器
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : ea_controller.php
*/

class Admin_Controller extends EA_Controller{
    protected $tpl = array();
    protected $layoutTpl = 'admin/header'; //默认布局
    protected $defaultModel = '';    //默认模块
    
	public function __construct(){
		parent::__construct();
        
        if($this->session->userdata('account_id')==false)
        {
            redirect(site_url(ADMIN_ROUTES."/login"));
        }
        
        $url = $this->uri->segment(1).'/'.$this->uri->segment(2);
        $jur = $this->session->userdata('jur');
        if($this->session->userdata('is_super')!=1 
                && !in_array($url,$jur))
        {
            redirect(site_url(ADMIN_ROUTES."/index/notaccess"));
        }

        //设置默认模型载入。
        if($this->defaultModel!='' ) $this->load->model($this->defaultModel,'model');
        $this->load->helper("admin_helper");
        
	}
    
    
    /**
     * 设置模版用默认数据于任何一个action中
     */
    protected function setDefaultTplData()
    {
        return array();
    }

    //列表页
    public function index($pid=0){
        
        $this->_setPage($this->model->rowsCount(),14);
        $ret['list'] = $this->model->select('*','',14,$_GET['per_page'],$this->model->pk.' DESC');
        $this->_view($this->tpl['index'],$ret);
        $this->load->view("admin/page");

    }
	
	//添加
    public function add($pid="0")
    {
        $ret['pid'] = $pid;
        if( $this->input->isPOST() )
        {
            $data=$this->check_field($_POST);
            $map = $data;
            if(isset($map['create_time'])) unset($map['create_time']);
            if(isset($map['edit_time '])) unset($map['edit_time ']);
            $id = $this->model->db->where($map)->get($this->model->TableName)->num_rows();
            if($id>0)
            {
                $ret['repayment']['e']="数据重复！";
            }
            else
            {
                $this->model->insert($data);
                $ret['repayment']['s']			='操作成功！';
                $ret['repayment']['insert_id'] 	= $this->model->db->insert_id();
            }
            $this->checkPOST($ret);
            
        }else $this->_view($this->tpl['add'],$ret);
    }
	//修改
    public function edit($id)
    {
        if( $this->input->isPOST() )
        {
            
            $data = $this->check_field($_POST);
            $this->model->update(array($this->model->pk=>$id),$data);
            $ret['repayment']['s']="操作成功！";
            $this->checkPOST($ret);
        }
        else
        {
            $ret['info'] = $this->model->find($id)->row();
            $this->_view($this->tpl['edit'],$ret);
        }
    }
    //删除    
    public function delete($id)

    {
        $ret =array();
        if($this->input->isPOST())
        {
        	
            $this->model->delete(array($this->model->pk=>$id));
            $ret['repayment']['s']="操作成功";
            $ret['repayment']['js']="history.back(-1)";
            $this->checkPOST($ret);
        }
        else
        {
        	
            $this->_view(array('admin/del_tpl',true),$ret);
        }
    }
    /*
     *检查字段是否可用
     * $data
     **/
    protected function check_field($post)
    {
        $data=array();
        $fields = $this->model->fields();
        foreach($post as $k=>$v) if(in_array($k,$fields)) $data[$k]=$v;
        return $data;
    }

    /* 
     * ----------------------------------------------------------
     * 布局/不同视图应用接口 与 load->view 使用方法相同
     * ----------------------------------------------------------
     * @param $url 模版路径，当为一个数组时，第一个值为模版名，第二个值为是否使用layout，当非数组时，查找tpl中是否存在该键值
     * @param $data
     */ 
    protected function _view($url,$data='',$flag = false)
    {
        $conf = is_array($url)? $url:$this->tpl[$url];
        $data = is_array($data) ? array_merge($this->setDefaultTplData(),$data)
                                : $this->setDefaultTplData();
                                
        if($conf[1] == true && $this->layoutTpl != '' )
        {
            $this->load->library(
                                'Layout',
                                array('layout'=>$this->layoutTpl)
                                );
            $ret = $this->layout->view($conf[0],$data,$flag);
        }
        else $ret = $this->load->view($conf[0],$data,$flag);
        if($flag == true ) return $flag;
    }
    
    //是post返回数据，还是json
    protected function checkPOST($ret)
    {
    	
    	if($this->input->isAJAX()) 
    	{
    		echo json_encode($ret['repayment']);
    	}
        else 
        {
        	$this->_view(array('admin/postpage',true),$ret);
        }
    }
}


/*
 * 前台通用控制器
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : ea_controller.php
*/

class Pub_Controller extends EA_Controller{
    protected $tpl = array();
    protected $layoutTpl = ''; //默认布局
    protected $defaultModel = '';    //默认模块
    
	public function __construct($modelName=''){
		parent::__construct();
       
       //设置默认类
        if($this->defaultModel!='') $this->load->model($this->defaultModel,'model');
	}
   
    
}
