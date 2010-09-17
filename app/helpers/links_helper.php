<?php
/*
 *　友情链接helper
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-26 00:00 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-04-26 00:00
 * $File   : news_helper.php
*/



/**
 * 链接列表
 */
function links_list($cate)
{
    $model = Auto_Model::regist("links_Model");
    $info = $model->getList('title,url,target',"cate_id = $cate");
    return $info;
}

