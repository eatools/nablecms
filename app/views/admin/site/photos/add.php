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
    <td ><input type="text" name="title" value=""></td>
</tr>

<tr class="tr_bg">
    <td>文件</td>
    <td>
    <script>
    	function setFile(filename){
    		
    		$('files').value=filename;
    		$('inputBox').show();
    		$('uploadplugin').hide();
    	}
    	function showUpload(){
    		$('inputBox').hide();
    		$('uploadplugin').show();
    	}
    	
    </script>
    
    <span id="inputBox" >
    <input type="text" name="files" id="files" value=""> 
    <img onclick="showUpload()" src="<?php echo base_url()?>media/images/icon/no.png">
    </span> 
    <?php $this->load->helper('uploadbox');?>
    <?php echo upload_iframe('setFile','uploadplugin',"border:0px;height:26px;display:none;overflow:hidden;")?>
    <i>(选择图片，并上传。)</i>
    </td>
</tr>
<tr class="tr_bg">
    <td>状态</td>
    <td  colspan="3"><input type="radio" name="is_del" value="0" checked>启用 <input type="radio" name="is_del" value="1" >禁用</td>
</tr>
<tr class="tr_bg">
    <td>备注</td>
    <td ><textarea name="remark" id="remark"  ></textarea><i>备注，或者文字内容</i>
    
    </td>
</tr>


<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><span id="mess"></span></td>
</tr>

</table>
</form>
