<?php
//网站地址
define('EA_BASE_URL',       'http://'.$_SERVER['HTTP_HOST'].'/nablecms/');
//网站名称
define('EA_WEB_NAME',       'NableCms');

define('EA_DB_HOST',        'localhost');
define('EA_DB_NAME',        '数据库名称');
define('EA_DB_USER',        '链接用户');
define('EA_DB_PASS',        '链接密码');
define('EA_DB_CHAR',        'utf8');  //charset
define('EA_DB_DRIVER',      'mysqli');  //驱动
define('EA_DB_PREFIX',      'ea_');


date_default_timezone_set('Asia/Shanghai');

define('THEMEPATH',        'theme/'); #主题路径

define('MEDIAPATH','media/');
define('JSPATH',MEDIAPATH.'/js');


#管理入口路由地址
define('ADMIN_ROUTES','admin');

#入口文件名
define('EA_Index_Name',     'index.php'); 

#模块路径
$application_folder = "./app"; 

#ci模块路径	
$system_folder = "system";
