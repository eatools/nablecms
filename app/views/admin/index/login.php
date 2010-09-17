<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="eatools.cn" name="Keywords" />
<meta content="eatools.cn" name="Description"/>
<script>
var base_url = "<?php echo base_url()?>";
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>media/css/default.css" /> 
<script type="text/javascript" src="<?php echo base_url()?>media/js/utils.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>media/js/prototype/lib/prototype.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>media/js/prototype/lib/src/effects.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>media/js/prototype/lib/formajax.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>media/js/prototype/loadmess.js"></script>

<title><?php echo $this->config->item('web_name')?> 后台管理系统 </title>
</head>
<script>



function check_login_form(obj){
        load_div.div = $('load_message');
        load_div.loading('登录中..');
        if(Utils.isEmpty(obj.username.value)==true){
            load_div.setHTML('登录名不能为空！');
            return false;
        }
        
        if(Utils.isEmpty(obj.pass.value)==true){
            load_div.setHTML('登录密码不能为空！');
            return false;
        }

        if(Utils.isEmpty(obj.checkcode.value)==true){
            $('mess')('验证码不能为空！');
            return false;
        }

        if( obj.checkcode.value.length!=4 ){
            load_div.setHTML('验证码格式不正确！！');
            return false;
        }
   
        FormRequest(obj,function(request,flag,json){
            if(flag=='s') location.href=json['u'];
        });
        return false;
}
var codeImg = "<?php echo site_url('/vcode/index')?>";

function set_check_codes(obj)
{
    var d = new Date();
    obj.src=codeImg+'/t/'+d.getTime();
}
</script>

<style>
.textinput{border:1px solid #999999;width:160px;}
</style>
<body>
<br/>
<br/>
<br/>

<center>

    <table cellpadding=0 cellspacing=0 border=0 >
        <tr>
            <Td width="359" height="255" value="top" style="background:url(<?php echo base_url()?>media/images/login_bg.jpg)">
            
            
  <form name="form1" id="form1" action="" method="POST" onsubmit="try{
  check_login_form(this); 
  return false;}catch(e){return false;}"> 


  <Table style="margin:30px 0 0 60px;line-height:24px;">
    <Tr>
        <td>用户名：</td>
        <td><input  class="textinput" type="text" name="username" ></td>
    </tr>
    <tr>
        <td>密&nbsp;&nbsp;&nbsp;码：</td>
        <td><input class="textinput" type="password" name="pass" ></td>
    </tr>

     <tr>
        <td> 验证码：</td>
        <td ><input class="textinput" style="width:60px;" type="text" name="checkcode" ><img style="height:18px;float:right;" title="登录成功或失败后代码会失效滴！
请再点我一下重新获取！"  onclick="set_check_codes(this)"  src="<?php echo site_url('/vcode/index')?>" ></td>
    </tr>
    <tr><Td></td><td ><input type="submit" value="登录"  > <span id="load_message" style="display:none;color:#ff0000;" ></span></td></tr>


    <tr>
        <Td colspan="2" align="center">Help | eatools.cn | 后台管理系统</td>
    </tr>
  </table>

</form>
            
            </td>
        </tr>
    </table>
    
</center>

</body>
</html>
