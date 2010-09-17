<form method="POST" action=""  enctype="multipart/form-data"  onsubmit="try{
FormRequest(this,'','mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width="100%" align="right" >
 <tr>
    <th colspan="2" align="left">广告添加</th>

 </tr>


<tr class="tr_bg">
    <td>名称</td>
    <td ><input type="text" name="title" value=""></td>
</tr>

<tr class="tr_bg">
    <td>所在页面</td>
    <td  ><select name="page_id">
        <?php foreach($pageList as $k=>$v):?>
            <option value="<?php echo $k?>"><?php echo $v?></option>
        <?php endforeach;?>
    </select><i>(分类)</i></td>
</tr>
<tr class="tr_bg">
    <td>备注</td>
    <td ><input type="text" name="commint" value=""><i>备注，或者文字内容</i></td>
</tr>

<tr class="tr_bg">
    <td>链接地址</td>
    <td><input type="text" name="links" value="" ><i>xxx/xxx/xxx 或者http://www.x.com</i></td>
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
    <iframe style="border:0px;height:26px;display:none;overflow:hidden;" id="uploadplugin" src="<?php echo site_url("files/pluginadd/")?>?script=setFile"></iframe>
    <i>(选择广告文件，并上传。)</i>
    </td>
</tr>

<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><span id="mess"></span></td>
</tr>

</table>
</form>
