<form method="POST" action="" onsubmit="try{
FormRequest(this,'','mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th colspan="2"  >修改广告</th>

 </tr>
<tr class="tr_bg">
    <td>名称</td>
    <td ><input type="text" name="title" value="<?php echo $info->title?>"></td>
</tr>

<tr class="tr_bg">
    <td>分类</td>
    <td ><select name="page_id">
        <?php foreach($pageList as $k=>$v):?>
            <option value="<?php echo $k?>" <?php echo ($k==$info->page_id)?"selected":""?>><?php echo $v?></option>
        <?php endforeach;?>
    </select><i>(分类)</i></td>


<tr class="tr_bg">
    <td>备注</td>
    <td ><input type="text" name="commint" value="<?php echo $info->commint?>"><i>(备注、文字内容)</i></td>
</tr>

<tr class="tr_bg">
    <td>链接地址</td>
    <td><input type="text" name="links" value="<?php echo $info->links?>" ><i>xxx/xxx/xxx 或者http://www.x.com</i></td>
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
    <input type="text" name="files" id="files" value="<?php echo $info->files?>"> 
    <img onclick="showUpload()" src="<?php echo base_url()?>media/images/icon/no.png">
    </span> 
    <iframe style="border:0px;height:26px;display:none;overflow:hidden;" id="uploadplugin" src="<?php echo site_url("files/pluginadd/")?>?script=setFile"></iframe>
    <i>(选择广告文件，并上传。)</i>
    </td>
</tr>


<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><span id="mess" style="display:none;"></span><input type="hidden" name="id" value="<?php echo $info->id?>" ></td>
</tr>

</table>
</form>
