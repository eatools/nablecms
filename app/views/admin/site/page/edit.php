<form method="POST" action="" onsubmit="try{
FormRequest(this,'','mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th colspan="2"  >修改信息</th>

 </tr>

<tr class="tr_bg">
    <td>上级</td>
    <td ><input type="text" name="pid" value="<?php echo $info->pid?>"></td>
</tr>

<tr class="tr_bg">
    <td>名称</td>
    <td ><input type="text" name="title" value="<?php echo $info->title?>"></td>
</tr>

<tr class="tr_bg">
    <td>使用控制器</td>
    <td>
        <select name="controller">
            <option value="">无</option>
            <?php foreach( $siteThemeConf['controller'] as $k=>$v):?>
                <option value="<?php echo $k?>" <?php echo ($info->controller == $k) ? 'selected':''?> ><?php echo $v?></option>
            <?php endforeach;?>
        </select>
        <i>(请选择一个界面布局，不选默认应用子分类的第一条布局样式。)</i>
    </td>
</tr>


<tr class="tr_bg">
    <td>使用模版</td>
    <td>
        <select name="tpl">
            <option value="">无</option>
            <?php foreach( $siteThemeConf['tpl']['default'] as $k=>$v):?>
                <option value="<?php echo $k?>" <?php echo ($info->tpl == $k) ? 'selected':''?> ><?php echo $v?></option>
            <?php endforeach;?>
        </select>
        <i>(请选择一个界面布局，不选默认应用子分类的第一条布局样式。)</i>
    </td>
</tr>
    
<tr class="tr_bg">
    <td>页面地址</td>
    <td ><input type="text" name="uri" value="<?php echo $info->uri?>"><i>(前台显示的路径编码,如果为首页，请填写index)</i></td>
</tr>
<tr class="tr_bg">
    <td>缓存时间</td>
    <td><input type="text" name="cache_time" value="<?php echo $info->cache_time?>"> <i>分，(页面缓存时间，指定时间内更新数据)</i></td>
</tr>
	
<tr class="tr_bg">
    <td>排序</td>
    <td><input type="text" name="orderby" value="<?php echo $info->orderby?>"> <i>降序排列</i></td>
</tr>


<tr class="tr_bg">
    <td>状态</td>
    <td>
    <?php if($info->is_del==1 ):?>
    <input type="radio" name="is_del" value="0" >显示 <input type="radio" name="is_del" value="1" checked>隐藏
    <?php else:?>
    <input type="radio" name="is_del" value="0" checked>显示 <input type="radio" name="is_del" value="1" >隐藏
    <?php endif;?>
    </td>
</tr>

<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><span id="mess" style="display:none;"></span><input type="hidden" name="id" value="<?php echo $info->id?>" ></td>
</tr>

</table>
</form>