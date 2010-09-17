<?php

/*
 * 功能说明
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-04-22 23:45 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010/1/10
 * $File   : 
*/
/**
 * Link
 *
 * Generates link to a CSS file
 * @return	string
 */
if ( ! function_exists('css_link'))
{
	function css_link($href = '')
	{
        $link = '<link rel="stylesheet" type="text/css" href="'.base_url(). _THEME_.'css/'.$href.'" />';
		return $link;
	}
}
if ( ! function_exists('js_link'))
{
	function js_link($href = '')
	{
        $link = '<script type="text/javascript" src="'.base_url( )._THEME_.'js/'.$href.'" /></script>';
		return $link;
	}
}

if ( ! function_exists('theme_css'))
{
	function theme_css($href = '')
	{
        $link = '<link rel="stylesheet" type="text/css" href="'.base_url(). _THEME_.'css/'.$href.'" />';
		return $link;
	}
}

if ( ! function_exists('theme_js'))
{
	function theme_js($href = '')
	{
        $link = '<script type="text/javascript" src="'.base_url( )._THEME_.'js/'.$href.'" /></script>';
		return $link;
	}
}

if ( ! function_exists('theme_img'))
{
	function theme_img($href = '',$ext='')
	{
        $link = '<img src="'.base_url( )._THEME_.'images/'.$href.'"  '.$ext.' />';
		return $link;
	}
}