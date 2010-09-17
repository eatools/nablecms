<?php

/*
 * 广告数据库模块
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : ads_model.php
*/

class Ads_Model extends EA_Model
{
    var $TableName  =   'ads';
    public $pk = 'id';
    public function __construct()
    {
        parent::__construct();
    }

}