
<?php
	function temp($temp)
	{
		if($temp==1)
		{
		$s='<font color=green>支持<b>√</b></font>';
		}
		else
		{
		$s='<font color=red>不支持<b>×</b></font>';
		}
		return $s;
	}
	/*获取服务器信息*/
	$info[] = array("域名","Domain Name",$_SERVER['SERVER_NAME']."&nbsp;-&nbsp;".getenv('SERVER_ADDR'));//主机名
	$info[] = array("服务器端口","Server Port",getenv('SERVER_PORT'));//端口
	$info[] = array("服务器操作系统","Operating System",PHP_OS); //服务器操作系统
	$info[] = array("WEB服务器版本","Web Server Version",$_SERVER['SERVER_SOFTWARE']); //web服务器版本
	$info[] = array("PHP版本","PHP Version",PHP_VERSION);//php版本
	$info[] = array("服务器语种","Server Language",getenv("HTTP_ACCEPT_LANGUAGE")); //服务器语种
	$info[] = array("ZEND版本","ZEND Version",zend_version());
	$info[] = array("绝对路径","Full path",$_SERVER['DOCUMENT_ROOT']. "<br>"); //绝对路径
	$info[] = array("服务器剩余空间","Disk Free Space",intval(diskfreespace(".") / (1024 * 1024))."M"); //服务器空间大小
	$info[] = array("服务器时间","Server Current Time",date("n月j日H点i分s秒")); //服务器时间
	
	/*PHP基本特性*/
	$dis_func = get_cfg_var("disable_functions");

	$php[] = array("自定义全局变量","register_globals",temp(get_cfg_var("register_globals")));
	$php[] = array("脚本运行可占最大内存","memory_limit",get_cfg_var("memory_limit")?get_cfg_var("memory_limit"):"无"); //单个脚本运行时可占用的最大内存
	$php[] = array("脚本上传文件大小限制","upload_max_filesize",get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):"不允许上传附件");   //用PHP脚本上传文件大小限制
	$php[] = array("被屏蔽的函数","disable_functions",get_cfg_var("disable_functions")?get_cfg_var("disable_functions"):"无"); //被屏蔽的函数
	$php[] = array("POST方法提交限制","post_max_size",get_cfg_var("post_max_size")); //post方法提交内容限制
	$php[] = array("脚本超时时间","max_execution_time",get_cfg_var("max_execution_time")."秒"); //脚本超时时间
	$php[] = array("显示错误信息","display_errors",temp(get_cfg_var("display_errors"))); 
	
	/*常见组件*/   
	$obj[] = array("SMTP支持","smtp",temp(get_magic_quotes_gpc("smtp")));//SMTP
	$obj[] = array("PHP安全模式","Safe_mode",temp(get_cfg_var("safe_mode")));  //PHP安全模式(Safe_mode)
	$obj[] = array("XML 解析函数库","XML Support",temp(get_magic_quotes_gpc("XML Support")));//XML 支持      
	$obj[] = array("FTP 文件传输函数库","FTP support",temp(get_magic_quotes_gpc("FTP support")));//FTP 支持
	$obj[] = array("允许使用URL打开文件","allow_url_fopen",temp(get_cfg_var("allow_url_fopen")));//允许使用URL打开文件
	$obj[] = array("动态链接库","enable_dl",temp(get_cfg_var("enable_dl")));//动态链接库
	
	/*其他组件*/
	$qobj[] = array("IMAP 电子邮件系统函数库","IMAP, POP3 and NNTP Functions",temp(function_exists("imap_close")));//IMAP电子邮件系统 
	$qobj[] = array("历法运算函数库","Calendar Functions",temp(function_exists("JDToGregorian")));//历法
	$qobj[] = array("压缩文件函数库(Zlib)","Zlib Compression Functions",temp(function_exists("gzclose"))); //压缩文件支持(Zlib)
	$qobj[] = array("Session支持","Session Handling Functions",temp(function_exists("session_start"))); //Session支持
	$qobj[] = array("Socket支持","Socket Functions",temp(function_exists("fsockopen"))); //Socket支持
	$qobj[] = array("正则表达式函数库","PREL",temp(function_exists("preg_match")));//PREL相容语法 PCRE
	@$gdInfo=gd_info();
	$qobj[] = array("图像函数库","GD Library",function_exists("imageline")==1?temp(function_exists("imageline")).$gdInfo["GD Version"]:temp(function_exists("imageline")));//图形处理 GD Library
	$qobj[] = array("FDF表单资料格式函数库","Forms Data Format Functions",temp(function_exists("FDF_close")));//FDF表单资料格式
	$qobj[] = array("Iconv编码转换","iconv Functions",temp(function_exists("iconv")));//ICONV
	$qobj[] = array("SNMP网络管理协议","SNMP Functions",temp(function_exists("snmpget")));//SNMP网络管理协议
	
	/*数据库信息*/
	$databases[] = array("MySQL 数据库","",temp(function_exists("mysql_close"))); //mysql数据库
	$databases[] = array("ODBC 数据库","",temp(function_exists("odbc_close"))); //odbc数据库
	$databases[] = array("Oracle 数据库","",temp(function_exists("ora_close"))); //ora数据库
	$databases[] = array("Oracle 8 数据库","",temp(function_exists("OCILogOff")));//Oracle 8 数据库
	$databases[] = array("SQL Server 数据库","",temp(function_exists("mssql_close")));//SQL Server数据库
	$databases[] = array("mSQL 数据库","",temp(function_exists("msql_close")));//msql数据库
	$databases[] = array("Hyperwave 数据库","",temp(function_exists("hw_close")));//Hyperwave数据库
	$databases[] = array("dBase 数据库","",temp(function_exists("dbase_close")));//dbase数据库
	$databases[] = array("PostgreSQL 数据库","",temp(function_exists("pg_connect")));//PostgreSQL数据库
	$databases[] = array("firePro 数据库","",temp(function_exists("filepro")));//firePro数据库

?>
<style>
.table1 {width:90%;}
</style>
<table style="margin:20px 0 0 20px;" >
	<tr><td><B>欢迎进入后台管理系统！</b></td></tr>
</table>
<table class="table table1" style="margin:20px 0 0 20px;" >
<tr>
	<th colspan="3" align="left">目录状态</th>

</tr>



</table>

<table class="table table1" style="margin:20px;">
<tr>
	<th colspan="3" align="left">服务器信息</th>

</tr>
<?php foreach($info as $item):?>
<tr>
	<td><?php echo $item[0]?></td>
	<td><?php echo $item[1]?></td>
	<td><?php echo $item[2]?></td>
</tr>
<?php endforeach;?>
</table>

<table class="table table1" style="margin:20px;">
<tr>
	<th colspan="3" align="left">php版本信息</th>

</tr>
<?php foreach($php as $item):?>
<tr>
	<td><?php echo $item[0]?></td>
	<td><?php echo $item[1]?></td>
	<td><?php echo $item[2]?></td>
</tr>
<?php endforeach;?>
</table>


<table class="table table1" style="margin:20px;">
<tr>
	<th colspan="3" align="left">常见组件</th>

</tr>
<?php foreach($obj as $item):?>
<tr>
	<td><?php echo $item[0]?></td>
	<td><?php echo $item[1]?></td>
	<td><?php echo $item[2]?></td>
</tr>
<?php endforeach;?>
</table>
	
<table class="table table1" style="margin:20px;">
<tr>
	<th colspan="3" align="left">其他组件</th>

</tr>
<?php foreach($qobj as $item):?>
<tr>
	<td><?php echo $item[0]?></td>
	<td><?php echo $item[1]?></td>
	<td><?php echo $item[2]?></td>
</tr>
<?php endforeach;?>
</table>

	<table class="table table1" style="margin:20px;">
<tr>
	<th colspan="2" align="left">数据库信息</th>

</tr>
<?php foreach($databases as $item):?>
<tr>
	<td><?php echo $item[0]?></td>
	<td><?php echo $item[2]?></td>
</tr>
<?php endforeach;?>
</table>
