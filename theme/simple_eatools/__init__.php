<?php

/*
 * 模版配置文件
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 10:25 2010/5/22 Able Gao <ablegao@gmail.com>
 * $Edit   : 10:25 2010/5/22
 * $File   : __init__.php
*/

    
return array(
    'name'      => 'eatools简约',          # 模版名称
    'thumbnail' => 'default.jpg',       # 缩略图
    
    'controller'=> array('news'=>'新闻模块','photos'=>'图片模块'),
    
    'tpl'       => array(               # 模版文件配置
           'default'=>array(
            'index.php'         => '主页模版', //index 默认为首页
            'news_sublevel_list.php'     => '新闻子级标题',
            'news_list.php'     => '新闻列表',
            'news_content.php'  => '新闻正页内容',
            'domain.php'  => '新闻正页列表页',
            'photo_list.php'    => '图片列表',
            'photo_content.php' => '图片正文',
            'sitemap.php' => 'google sitemap',
            ),
            'wap'=>array(
            
            ),
        ),
    

);
