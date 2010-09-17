<?php
/*
 *　新闻信息组建
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
 * 新闻分页列表
 */
function news_page_list($pageid,$size=10,$rows=0)
{
    $model = Auto_Model::regist("news_model");
    $info = $model->db->select('id,title,tag,author,create_time,content')
                    ->where(array('page_id'=>$pageid))
                    ->limit($size,$rows)
                    ->order_by('id DESC')
                    ->get($model->TableName);
    return $info;
}


/**
 * 新闻总数
 */
function news_page_list_count($pageid)
{
    $model = Auto_Model::regist("news_model");
    $info = $model->db->where(array('page_id'=>$pageid))
                    ->from($model->TableName)
                    ->count_all_results();
    return $info;
}



/**
 * 获取某分类下，制定数量的内容
 * @param int $pageid 页面分类id, 
 * @param int $rows 记录数量
 */
function news_top_dl($pageid,$rows,$title='',$class='')
{
    $model = Auto_Model::regist("news_model");
    $info = $model->get_list($pageid,$rows);
    $html = '<dl class="'.$class.'">';
    $html .= "<dt>$title</dt>";
    foreach($info->result() as $item)
    {
       $html .= "<dd>$item->title</dd>";
    }
    $html .= '</dl>';
    return $html;
}

/**
 * 获取新闻完整信息的最新记录
 * @param int $page_id
 * @param int $size
 */

function news_content_in_top($page_id,$size=1)
{
    $model = Auto_Model::regist("news_model");
    return  $model->get_content_list($page_id,$size);
}

/**
 * 无分类的列表
 * @param int $row
 */
function news_no_categroy_top($row=10)
{

    $model = Auto_Model::regist("news_model");
    $info = $model->select("id,title,create_time,content",array("is_del"=>0),$row,0,"create_time desc");
    return $info;
}
    
/**
 * 获取新闻正文
 */
function news_content($news_id)
{
    $CI =  & get_instance();
    $info = $CI->db->select('*')
            ->where("id =  $news_id")
            ->get('news')->row();
    return $info;
}
