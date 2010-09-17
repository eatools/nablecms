<?php

/*
 * 前台主页面
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : default.php
*/


class easerver extends Pub_Controller
{
    protected $NowPage;
    public function __construct()
    {
        parent::__construct();
    }
    //主操作函数
    public function index()
    {
        redirect("easyaserver");
    }
    

}
