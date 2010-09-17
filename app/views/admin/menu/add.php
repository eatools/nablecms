<form method="POST" action="" onsubmit="try{
FormRequest(this);
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr >
    <th colspan="2">添加信息</th>
 </tr>
 <tr class="tr_bg">
    <td >上级</td>
    <td ><input type="text" name="pid" value="<?php echo $pid ?>" ></td>
 </tr>
<tr class="tr_bg" >
    <td>名称</td>
    <td><input type="text" name="title" value=""></td>
</tr>

<tr class="tr_bg">
    <td>路径</td>
    <td><input type="text" name="url" value=""></td>
</tr>
<tr class="tr_bg">
    <td>排序</td>
    <td><input type="text" name="order" value="0"></td>
</tr>
<tr class="tr_bg">
    <td>是否为参数</td>
    <td><input type="radio" name="is_param" value="0" checked>否 <input type="radio" name="is_param" value="1" >是</td>
</tr>

<tr class="tr_bg">
    <td>状态</td>
    <td><input type="radio" name="is_del" value="0" checked>启用 <input type="radio" name="is_del" value="1" >禁用</td>
</tr>
<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"></td>
</tr>

</table>
</form>
