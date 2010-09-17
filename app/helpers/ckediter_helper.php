<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * cfediter编辑器
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : 
*/

if(!function_exists('ckediter'))
{
    function ckediter($inputName)
    {
        $html="
<script type=\"text/javascript\"  src=\"".base_url()."media/js/ckeditor/ckeditor.js\"></script>
<script type=\"text/javascript\" src=\"".base_url()."media/js/ckeditor/ea_conf.js\"></script>
<script type=\"text/javascript\">
    Event.observe(window,'load',function(){
        createEditor( '$inputName' );
    });
</script>
    ";
    return $html;
    }
}