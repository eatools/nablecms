<form method="POST" action="" onsubmit="try{
FormRequest(this);
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
    <td>超级管理员</td>
    <td>
    <?php if($info->is_super==1 ):?>
    <input type="radio" name="is_super" value="1" checked>是 <input type="radio" name="is_super" value="0" >否 
    <?php else:?>
    <input type="radio" name="is_del" value="1" >是 <input type="radio" name="is_del" value="0" checked>否 
    <?php endif;?>
    </td>
</tr>

<tr class="tr_bg">
    <td>状态</td>
    <td>
    <?php if($info->is_del==1 ):?>
    <input type="radio" name="is_del" value="0" >启用 <input type="radio" name="is_del" value="1" checked>禁用
    <?php else:?>
    <input type="radio" name="is_del" value="0" checked>启用 <input type="radio" name="is_del" value="1" >禁用
    <?php endif;?>
    </td>
</tr>

<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><input type="hidden" name="account_id" value="<?php echo $info->account_id?>" ></td>
</tr>

</table>
</form>

<br/>
<form method="POST" name="form2" action="<?php echo site_url('account/changepass')?>" onsubmit="try{
if(this.passwd.value=='' || this.dbpasswd.value=='' || this.passwd.value!=this.dbpasswd.value)
{
    alert('密码格式错误或者两次密码不相同！');
    return false;
}
FormRequest(this);
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th colspan="2"   >修改密码</th>

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
    <td><input type="submit" value="保存"><input type="hidden" name="account_id" value="<?php echo $info->account_id?>" ></td>
</tr>

</table>
</form>




<form method="POST" name="form3" action="<?php echo site_url('account/checkrole')?>" onsubmit="try{

FormRequest(this);
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th colspan="2"   >修改角色</th>

 </tr>

<tr class="tr_bg">
    <td>选择：</td>
    <td>
        <?php
            //$info
            
        ?>
        <?php foreach($role_list as $item):?>
            <input type="checkbox" name="role_id[]" value="<?php echo $item->role_id?>"> <?php echo $item->title?>
        <?php endforeach;?>
    </td>
</tr>



<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><input type="hidden" name="account_id" value="<?php echo $info->account_id?>" ></td>
</tr>

</table>
</form>