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

class Blogs_Model extends EA_Model
{
    var $TableName  =   'blogs';
    public $pk = 'id';
    public function __construct()
    {
        parent::__construct();
    }

}