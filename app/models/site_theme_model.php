<?php

/*
 * 站点布局数据库模块
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-05-01 05:09 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-05-01 05:09
 * $File   : Site_Layout_Model.php
*/

class Site_Theme_Model extends EA_Model
{
    var $TableName  =   'site_theme';
    public $pk = 'seq';
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * 获取当前应用模版文件配置
     */
     
    public function getThemeConf()
    {
        $info = $this->find(array("seq"=>1))->row();
        return include(FCPATH . THEMEPATH . "/$info->theme/__init__.php");
    }

    public function getThemeDir()
    {
        $this->db->cache_on();
        $themeInfo = $this->db->select('theme')
                        ->where(array('seq'=>1))
                        ->get('site_theme')
                        ->row();
        return $themeInfo->theme;
    }

}
