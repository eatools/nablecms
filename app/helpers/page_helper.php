<?php
/*
 *　导航页面
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
 * 获得导航栏目
 */
function page_menu_get_list($id=0)
{
    $CI =  & get_instance();
    return $CI->db->select('id,tpl,uri,title,edit_time')->from('site_page')
            ->where("pid = $id AND is_del = 0 ")
            ->order_by("orderby DESC,id ASC")
            ->get();
}

function pagination($rowsCount,$url,$uri, $size=12,$CONF=array())
{
    $CI =  & get_instance();
    $CI->load->library('pagination');

    $config['total_rows'] = $rowsCount;
    $config['per_page'] = $size; 
    
    $config['first_link'] ="第一页";
    $config['last_link'] ="最后一页";
    $config['next_link'] ="下一页";
    $config['prev_link'] ="上一页";
    $config['base_url'] = $url;
    $config['uri_segment']=$uri;
    $config = array_merge($config,$CONF);
    $CI->pagination->initialize($config);
    return $CI->pagination;
}