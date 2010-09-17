<form method="POST" action="" onsubmit="try{
FormRequest(this);
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr  class="tr_bg">
    <th colspan="2">添加角色</th>
 </tr>

<tr class="tr_bg" >
    <td>名称</td>
    <td><input type="text" name="title" value=""></td>
</tr>

<tr class="tr_bg">
    <td>备注</td>
    <td><input type="text" name="remark" value=""></td>
</tr>

<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"></td>
</tr>

</table>
</form>