<form method="POST" action="" onsubmit="try{
FormRequest(this,'','mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th colspan="2"  >修改信息</th>

 </tr>

<tr class="tr_bg">
    <td>布局名称</td>
    <td><input type="text" name="title" value="<?php echo $info->title?>"></td>
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
    <td><input type="text" name="tpl" value="<?php echo $info->tpl?>">多模版用;分割。</td>
    
</tr>
<tr class="tr_bg">
    <td>功能模块</td>
    <td valign="top"><textarea  style="font-size:12px;width:400px;height:200px;" name="module"><?php echo $info->module?></textarea>规则：ModuleName.actionName|param,param,param </td>
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
    <td><input type="submit" value="保存"><span id="mess" style="display:none;"></span><input type="hidden" name="layout_id" value="<?php echo $info->layout_id?>" ></td>
</tr>

</table>
</form>
