<?php $this->load->helper('ckediter');?>
<?php echo ckediter('remark')?>
<form method="POST" action=""  enctype="multipart/form-data"  onsubmit="try{
this.remark.value = editor.getData();
FormRequest(this,'','mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width="100%" align="right" >
 <tr>
    <th colspan="2" align="left">发布图片<input type="hidden" name="page_id" value="<?php echo $this->uri->segment(3)?>" ></th>

 </tr>


<tr class="tr_bg">
    <td>名称</td>
    <td ><input type="text" name="title" value="<?php echo $info->title?>"></td>
</tr>

<tr class="tr_bg">
    <td>备注</td>
    <td ><textarea name="remark" id="remark"  ><?php echo $info->remark?></textarea><i>备注，或者文字内容</i>
    
    </td>
</tr>


<tr class="tr_bg">
    <td>文件</td>
    <td>
   	<?php echo $info->files?>
    </td>
</tr>
<tr class="tr_bg">
    <td>状态</td>
    <td  >
    
    <?php if($info->is_del==1 ):?>
    <input type="radio" name="is_del" value="0" >启用 <input type="radio" name="is_del" value="1" checked>禁用
    <?php else:?>
    <input type="radio" name="is_del" value="0" checked>启用 <input type="radio" name="is_del" value="1" >禁用
    <?php endif;?>
    </td>
</tr>
<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><span id="mess"></span></td>
</tr>

</table>
</form>
