<form method="POST" action="" onsubmit="try{
FormRequest(this);
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width="100%" align="right" >
 <tr>
    <th colspan="2" align="left">模块添加</th>

 </tr>
<tr class="tr_bg">
    <td>名称</td>
    <td ><input type="text" name="title" value=""></td>
</tr>
<tr class="tr_bg">
    <td>code</td>
    <td><input type="text" name="module_name" value=""></td>
</tr>

<tr class="tr_bg">
    <td>菜单id</td>
    <td ><input name="menu_id" value="0" ></td>
</tr>

<tr class="tr_bg">
    <td>备注</td>
    <td ><input type="text" name="remark" value=""></td>
</tr>

<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"></td>
</tr>

</table>
</form>
