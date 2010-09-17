<form method="POST" action="" onsubmit="try{
FormRequest(this);
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr class="tr_bg">
    <th colspan="2">修改角色</th>

 </tr>

<tr class="tr_bg">
    <td>名称</td>
    <td><input type="text" name="title" value="<?php echo $info->title?>"></td>
</tr>

<tr class="tr_bg">
    <td>备注</td>
    <td><input type="text" name="remark" value="<?php echo $info->remark?>"></td>
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
    <td><input type="submit" value="保存"><input type="hidden" name="role_id" value="<?php echo $info->role_id?>" ></td>
</tr>

</table>
</form>