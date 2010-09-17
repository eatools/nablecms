<?php

/*
 * 扩展input
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : EA_Input
*/
class EA_Input extends CI_Input{
	public function __construct()
    {
		parent::CI_Input();
	}

    //判断为AJAX模式操作
    public function isAJAX()
    {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
           && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH'])=='XMLHTTPREQUEST')
        {
        return true;
        }
        else {
        return false;
        }
    }

    //判断为POST模式操作
    public function isPOST()
    {
        return strtoupper($_SERVER['REQUEST_METHOD'])=='POST';
    }

}