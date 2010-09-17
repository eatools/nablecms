<form method="POST" action="" onsubmit="try{
FormRequest(this);
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width="100%" align="right" >
 <tr>
    <th colspan="2" align="left">修改信息</th>

 </tr>
<tr class="tr_bg">
    <td>登录名</td>
    <td ><input type="text" name="username" value=""></td>
</tr>
<tr class="tr_bg">
    <td>昵称</td>
    <td><input type="text" name="nickname" value=""></td>
</tr>
<tr class="tr_bg">
    <td>密码</td>
    <td><input type="text" name="passwd" value=""></td>
</tr>

<tr class="tr_bg">
    <td>邮箱</td>
    <td><input type="text" name="mail" value=""></td>
    
</tr>


<tr class="tr_bg">
    <td>状态</td>
    <td>
    <input type="radio" name="is_del" value="0" checked>启用 <input type="radio" name="is_del" value="1" >禁用

    </td>
</tr>

<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"></td>
</tr>

</table>
</form>
