<?php

/*
 * 数据库模块
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : 
*/

class Auto_Model extends EA_Model
{   
    public static $class=array();
    public function __construct()
    {
        parent::__construct();
    }
    
    public static function regist($name)
    {
        if(isset(self::$class[$name]))
        {
            return self::$class[$name];
        }
        else
        {
            $CI =  & get_instance();
            $CI->load->model($name);
            return self::$class[$name] = & $CI->$name;
        }
    }

}
