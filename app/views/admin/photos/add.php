<?php $this->load->helper('ckediter');?>
<script type="text/javascript">
	var imgPath="<?php echo base_url()?>media/upload/";
	function setImg(fileName)
	{
		$('imgBox').innerHTML +="<a onclick='appendToEditor(this)'>"+fileName+"</a>&nbsp;";//"<a href='' >"+fileName+"</a>";
	}
	function appendToEditor(Obj)
	{	
		
	}
</script>
<?php echo ckediter('content')?>
<form method="POST" action="" onsubmit="try{
this.content.value = editor.getData();
FormRequest(this,function(request,flag,conf){
    if(flag=='s')
    {
        if(confirm('添加成功！\n点击 [确认] 进入该文章编辑页面！\n或者 [取消] 继续添加! ')){
            location.href='<?php echo site_url("news/edit/".$this->uri->segment(3));?>/'+conf['insert_id'];
        }
    }
},'mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr >
    <th colspan="4">添加信息<input type="hidden" name="page_id" value="<?php echo $this->uri->segment(3)?>" ></th>
 </tr>

<tr class="tr_bg" >
    <td>标题</td>
    <td>
        <input type="text" name="title" value="">
    </td>
</tr>

<tr>
	<td>图片</td>
	<td >
    <span id='imgbox'></span>
    <p>
	<?php $this->load->helper('uploadbox');?>
	<?php echo upload_iframe('setImg')?>
	</p>
    </td>
</tr>

<tr class="tr_bg">
    <td>备注</td>
    <td  ><textarea name="content" ></textarea>
    
    </td>

</tr>


<tr class="tr_bg">
    <td>状态</td>
    <td ><input type="radio" name="is_del" value="0" checked>启用 <input type="radio" name="is_del" value="1" >禁用</td>
</tr>
<tr class="tr_bg">
    <td></td>
    <td   ><input type="submit" value="保存"><span style="display:none;" id="mess"></span></td>
</tr>

</table>
</form>