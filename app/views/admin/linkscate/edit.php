<form method="POST" action="" onsubmit="try{
FormRequest(this,'','mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th colspan="2"  >修改链接</th>

 </tr>
<tr class="tr_bg">
    <td>名称</td>
    <td ><input type="text" name="title" value="<?php echo $info->title?>"></td>
</tr>


<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><span id="mess" style="display:none;"></span><input type="hidden" name="id" value="<?php echo $info->id?>" ></td>
</tr>

</table>
</form>
