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
    <td>分类</td>
    <td ><select name="cate_id">
        <?php foreach($linkscateList as $k=>$v):?>
            <option value="<?php echo $k?>" <?php echo ($k==$info->cate_id)?"selected":""?>><?php echo $v?></option>
        <?php endforeach;?>
    </select><i>(分类)</i></td>


<tr class="tr_bg">
    <td>页面地址</td>
    <td ><input type="text" name="url" value="<?php echo $info->url?>"><i>(站点路径)</i></td>
</tr>


<tr class="tr_bg">
    <td>Target</td>
    <td><input type="text" name="target" value="<?php echo $info->target?>"> <i>链接位置.如：_blank</i></td>
</tr>


<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><span id="mess" style="display:none;"></span><input type="hidden" name="id" value="<?php echo $info->id?>" ></td>
</tr>

</table>
</form>
