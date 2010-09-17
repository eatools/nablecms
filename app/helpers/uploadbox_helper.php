<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * upload helper
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 23:47 2010/5/12 Able Gao <ablegao@gmail.com>
 * $Edit   : 23:47 2010/5/12
 * $File   : uploadbox_helper.php
*/
if(!function_exists('upload_iframe')) 
{

function upload_iframe($jsScript,$id='uploadplugin',$style='border:0px;height:26px;width:350px;')
{
    
	$html ='<iframe style="'.$style.'" id="'.$id.'" src="'.site_url(ADMIN_ROUTES."/files/pluginadd/").'?script='.$jsScript.'"></iframe>';
	return $html;
}

}

