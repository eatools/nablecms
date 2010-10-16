<form method="POST" action="" onsubmit="try{
FormRequest(this,'','mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th colspan="2"  >修改信息</th>

 </tr>
<tr class="tr_bg">
    <td>登录名</td>
    <td><?php echo $info->username?></td>
</tr>
<tr class="tr_bg">
    <td>昵称</td>
    <td><input type="text" name="nickname" value="<?php echo $info->nickname?>"></td>
</tr>

<tr class="tr_bg">
    <td>邮箱</td>
    <td><input type="text" name="mail" value="<?php echo $info->mail?>"></td>
</tr>


<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><span id="mess" class="hide" style="display:none;"></span><input type="hidden" name="account_id" value="<?php echo $account_id?>" ></td>
</tr>

</table>
</form>

<br/>
<form method="POST" name="form2" action="<?php echo site_url(ADMIN_ROUTES.'/account/changepassofmy')?>" onsubmit="try{
if(this.oldpasswd.value=='' || this.passwd.value=='' || this.dbpasswd.value=='' || this.passwd.value!=this.dbpasswd.value)
{
    alert('密码格式错误或者两次密码不相同！');
    return false;
}
FormRequest(this,'','editpassmess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th colspan="2"   >修改密码</th>

 </tr>
<tr class="tr_bg">
    <td>原始密码</td>
    <td><input type="password" name="oldpasswd" value=""></td>
</tr>

<tr class="tr_bg">
    <td>密码</td>
    <td><input type="password" name="passwd" value=""></td>
</tr>

<tr class="tr_bg">
    <td>确认密码</td>
    <td><input type="password" name="dbpasswd" value=""></td>
</tr>


<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><span id="editpassmess" class="hide" style="display:none;"></span><input type="hidden" name="account_id" value="<?php echo $account_id?>" ></td>
</tr>

</table>
</form>


