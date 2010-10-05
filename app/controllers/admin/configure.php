<?php

/*
 * 系统配置信息
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 11:13 2010/5/8 Able Gao <ablegao@gmail.com>
 * $Edit   : 11:13 2010/5/8
 * $File   : configure.php
*/

class configure extends Admin_Controller
{
    protected $tpl = array('index'=>array('admin/configure/index',true),
                           'edit' =>array('admin/configure/edit',true),
                           'add'  =>array('admin/configure/add',true),
                           );
    protected $defaultModel ='Configure_Model';

    public function __construct(){
        parent::__construct();
    }


}
