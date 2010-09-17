<form method="POST" action="" onsubmit="try{
FormRequest(this);
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th colspan="2"  >修改信息</th>

 </tr>

<tr class="tr_bg">
    <td>名称</td>
    <td ><input type="text" name="title" value="<?php echo $info->title?>"></td>
</tr>
<tr class="tr_bg">
    <td>code</td>
    <td><input type="text" name="module_name" value="<?php echo $info->module_name?>"></td>
</tr>
<tr class="tr_bg">
    <td>菜单id</td>
    <td ><input name="menu_id" value="<?php echo $info->menu_id?>" ></td>
</tr>


<tr class="tr_bg">
    <td>备注</td>
    <td ><input type="text" name="remark" value="<?php echo $info->remark?>"></td>
</tr>



<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><input type="hidden" name="id" value="<?php echo $info->id?>" ></td>
</tr>

</table>
</form>
