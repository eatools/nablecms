<?php

/*
 * 图片发布数据库模块
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 0:05 2010/5/13 Able Gao <ablegao@gmail.com>
 * $Edit   : 0:05 2010/5/13
 * $File   : photos_model.php
*/

class Photos_Model extends EA_Model
{
    var $TableName  =   'photos';
    public $pk = 'id';
    public function __construct()
    {
        parent::__construct();
    }

}