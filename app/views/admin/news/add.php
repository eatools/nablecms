<?php $this->load->helper('ckediter');?>
<script type="text/javascript">
	var imgPath="<?php echo base_url()?>media/upload/";
	function setImg(fileName,fileurl)
	{
		$('imgBox').innerHTML +="<a onclick='appendToEditor(\""+fileurl+"\")'>"+fileName+"</a>&nbsp;";//"<a href='' >"+fileName+"</a>";
	}
	function appendToEditor(fileurl)
	{	
		var img = "<img src='" + imgPath + fileurl+"' >";
		editor.insertHtml(img);
	}
</script>
<?php echo ckediter('content')?>
<form method="POST" action="" onsubmit="try{
this.content.value = editor.getData();
FormRequest(this,function(request,flag,conf){
    if(flag=='s')
    {
        if(confirm('添加成功！\n点击 [确认] 进入该文章编辑页面！\n或者 [取消] 继续添加! ')){
            location.href='<?php echo site_url(ADMIN_ROUTES."/news/edit/");?>/'+conf['insert_id'];
        }
    }
},'mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr >
    <th colspan="4">添加信息<input type="hidden" name="page_id" value="<?php echo $pid?>" ></th>
 </tr>

<tr class="tr_bg" >
    <td>名称</td>
    <td>
    <input type="text" name="title" value="">
    <input size="3" name="fontsize" type="text" value="14">px 
     #<input size="6" type="text" value="000000" name="fontcolor" >
    </td>
    
    <td>作者</td>
    <td><input type="text" name="author" value=""></td>
</tr>
<tr>
	<td>标签</td>
	<td ><input type="text" name="tag" value="" > <i>(该功能用于搜索引擎优化！)</i></td>
    <td>来源</td><td><input type="text" value="" name="address" ><i></i></td>
</tr>

<tr class="tr_bg">
    <td>内容</td>
    <td colspan="3"><textarea name="content" ></textarea>
    
    </td>

</tr>
<tr>
	<td>图片</td>
	<td colspan="3">
	<span id="imgBox"></span>
	<p>
	<?php $this->load->helper('uploadbox');?>
	<?php echo upload_iframe('setImg')?>
	</p>
	</td>
</tr>

<tr class="tr_bg">
    <td>状态</td>
    <td  colspan="3"><input type="radio" name="is_del" value="0" checked>启用 <input type="radio" name="is_del" value="1" >禁用</td>
</tr>
<tr class="tr_bg">
    <td></td>
    <td  colspan="3"><input type="submit" value="保存"><span style="display:none;" id="mess"></span></td>
</tr>

</table>
</form>
