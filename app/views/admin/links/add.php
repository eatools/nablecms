<form method="POST" action="" onsubmit="try{
FormRequest(this,'','mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width="100%" align="right" >
 <tr>
    <th colspan="2" align="left">链接添加</th>

 </tr>


<tr class="tr_bg">
    <td>名称</td>
    <td ><input type="text" name="title" value=""></td>
</tr>

<tr class="tr_bg">
    <td>分类</td>
    <td  ><select name="cate_id">
        <?php foreach($linkscateList as $k=>$v):?>
            <option value="<?php echo $k?>"><?php echo $v?></option>
        <?php endforeach;?>
    </select><i>(分类)</i></td>
</tr>
<tr class="tr_bg">
    <td>页面地址</td>
    <td ><input type="text" name="url" value="http://"><i>(站点路径)</i></td>
</tr>


<tr class="tr_bg">
    <td>Target</td>
    <td><input type="text" name="target" value=""> <i>链接位置.如：_blank</i></td>
</tr>

<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><span id="mess"></span></td>
</tr>

</table>
</form>
