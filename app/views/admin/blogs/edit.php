
<form method="POST" action="" onsubmit="try{
FormRequest(this,'','mess');
return false;
}catch(e){alert(e.message);return false;}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th colspan="4">修改信息</th>
 </tr>
<tr class="tr_bg" >
    <td>名称</td>
    <td><input type="text" name="title" value="<?php echo $info->title?>"></td>
</tr>
<tr class="tr_bg" >
    <td>作者</td>
    <td><input type="text" name="author" value="<?php echo $info->author?>"></td>
</tr>
<tr class="tr_bg">
    <td>内容</td>
    <td colspan="3"><textarea name="log" ><?php echo $info->log?></textarea>
    </td>
</tr>
<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><input type="hidden" name="id" value="<?php echo $info->id?>" ><span id="mess" style="display:none;"></span></td>
</tr>
</table>
</form>