<?php

/*
 * 广告帮助文件
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : 
*/

function ads_flash($page_id,$title,$width=1003,$height="260",$size=5)
{
    $model = Auto_Model::regist("news_model");
    $info = $model->db->select('id,title,files')
                     ->where(array('page_id'=>$page_id,'title'=>$title))
                     ->limit($size)->get('ads')->result();
    $html ='
        <script type="text/javascript" src="'.site_url().'media/ad/ad1.js"></script>
        <div class=pic_show>
          <div id=imgADPlayer></div>
          <script type="text/javascript" > 
        ';
    foreach($info as &$item)
    {
        $html.='PImgPlayer.addItem( "", "", "'.site_url().'media/upload/'.$item->files.'"); ';
    }
    $html.='
            PImgPlayer.init( "imgADPlayer", '.$width.', '.$height.' );   
            </script>
        </div>
     ';
    return $html;
}