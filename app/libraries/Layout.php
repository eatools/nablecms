<?php

/*
 * 布局视图类
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : libraries\layout.php
*/

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Layout 
{
   
    var $obj;
    var $layout;
    var $data=array();
    function Layout($layout = "layout_main")
    {
        $this->obj =& get_instance();
        $this->layout = $layout['layout'];
    }

    //标准显示数据
    public function setData($data)
    {
        $this->data = $data;
    }
    //设置布局页面
    function setLayout($layout)
    {
      $this->layout = $layout;
    }
   //应用显示接口
    function view($view, $data=null, $return=false)
    {
        $this->data['content_for_layout'] = $this->obj->load->view($view,$data,true);
       
        if($return)
        {
            $output = $this->obj->load->view($this->layout,$this->data, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout,$this->data, false);
        }
    }
} 