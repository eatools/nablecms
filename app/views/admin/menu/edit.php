<form method="POST" action="" onsubmit="try{
FormRequest(this);
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th colspan="2">修改信息</th>

 </tr>
<tr class="tr_bg">
    <td>PID</td>
    <td><input type="text" name="pid" value="<?php echo $info->pid?>"></td>
</tr>
<tr class="tr_bg">
    <td>名称</td>
    <td><input type="text" name="title" value="<?php echo $info->title?>"></td>
</tr>

<tr class="tr_bg">
    <td>路径</td>
    <td><input type="text" name="url" value="<?php echo $info->url?>"></td>
</tr>
<tr class="tr_bg">
    <td>排序</td>
    <td><input type="text" name="order" value="<?php echo $info->order?>"></td>
</tr>

<tr class="tr_bg">
    <td>是否为参数</td>
    <td>
    <?php if($info->is_param==1 ):?>
    <input type="radio" name="is_param" value="0" >否 <input type="radio" name="is_param" value="1" checked>是
    <?php else:?>
    <input type="radio" name="is_param" value="0" checked>否 <input type="radio" name="is_param" value="1" >是
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
    <td><input type="submit" value="保存"><input type="hidden" name="id" value="<?php echo $info->id?>" ></td>
</tr>

</table>
</form>