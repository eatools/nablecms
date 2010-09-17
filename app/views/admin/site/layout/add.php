<form method="POST" action="" onsubmit="try{
FormRequest(this,'','mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width="100%" align="right" >
 <tr>
    <th colspan="2" align="left">页面添加</th>

 </tr>

<tr class="tr_bg">
    <td>布局名称</td>
    <td><input type="text" name="title" value=""></td>
</tr>

<tr class="tr_bg">
    <td>主功能</td>
    <td>
        <select name="admin_module">
            <option value="">无</option>
            <?php foreach( $sitemodule as $k=>$v):?>
                <?php if($info->admin_module == $k):?>
                <option value="<?php echo $k?>" selected><?php echo $v?></option>
                <?php else:?>
                <option value="<?php echo $k?>"><?php echo $v?></option>
                <?php endif;?>
            <?php endforeach;?>
        </select>
    </td>
</tr>

<tr class="tr_bg">
    <td>模版</td>
    <td><input type="text" name="tpl" value=""> 多模版用;分割。</td>
</tr>
<tr class="tr_bg">
    <td>功能模块</td>
    <td><textarea style="font-size:12px;width:400px;" name="module"></textarea>规则：ModuleName.actionName|param,param,param;</td>
</tr>

<tr class="tr_bg">
    <td>状态</td>
    <td>
    <input type="radio" name="is_del" value="0" checked>启用 <input type="radio" name="is_del" value="1" >禁用
    </td>
</tr>

<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><span id="mess"></span></td>
</tr>

</table>
</form>
