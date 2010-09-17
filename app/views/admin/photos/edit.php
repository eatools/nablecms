<?php $this->load->helper('ckediter');?>
<script type="text/javascript">
	var imgPath="<?php echo base_url()?>media/upload/";
	function setImg(fileName)
	{
		$('imgBox').innerHTML +="<a onclick='appendToEditor(this)'>"+fileName+"</a>&nbsp;";//"<a href='' >"+fileName+"</a>";
	}
	function appendToEditor(Obj)
	{	
		var img = "<img src='" + imgPath + Obj.innerHTML+"' >";
		editor.insertHtml(img);
	}
</script>

	
<?php echo ckediter('content')?>
<form method="POST" action="" onsubmit="try{
this.content.value = editor.getData();
FormRequest(this,'','mess');
return false;
}catch(e){alert(e.message);return false;}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th colspan="4">修改信息</th>

 </tr>


<tr class="tr_bg" >
    <td>名称</td>
    <td><input type="text" name="title" value="<?php echo $info->title?>">
    <input size="3" name="fontsize" type="text" value="<?php echo $info->fontsize?>">px 
     #<input size="6" type="text" value="<?php echo $info->fontcolor?>" name="fontcolor"  >
    </td>
        <td>作者</td>
    <td><input type="text" name="author" value="<?php echo $info->author?>"></td>
</tr>
<tr>

	<td>标签</td>
	<td ><input type="text" name="tag" value="<?php echo $info->tag?>"  > <i>(该功能用于搜索引擎优化！)</i></td>
    <td>来源</td><td><input type="text" value="<?php echo $info->address?>" name="address" ><i></i></td>
</tr>
</tr>
<tr class="tr_bg">
    <td>内容</td>
    <td colspan="3"><textarea name="content" ><?php echo $info->content?></textarea>
    </td>
</tr>

<tr>
	<td>图片</td>
	<td colspan="3">
	<span id="imgBox"></span>
	<p><iframe style="border:0px;height:26px;" id="uploadplugin" src="<?php echo site_url("files/pluginadd/")?>?script=setImg"></iframe></p>
	</td>
</tr>
	
	
<tr class="tr_bg">
    <td>状态</td>
    <td  colspan="3">
    <?php if($info->is_del==1 ):?>
    <input type="radio" name="is_del" value="0" >启用 <input type="radio" name="is_del" value="1" checked>禁用
    <?php else:?>
    <input type="radio" name="is_del" value="0" checked>启用 <input type="radio" name="is_del" value="1" >禁用
    <?php endif;?>
    </td>
</tr>

<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><input type="hidden" name="id" value="<?php echo $info->id?>" ><span id="mess" style="display:none;"></span></td>
</tr>

</table>
</form>