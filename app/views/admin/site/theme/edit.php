<script language="Javascript" type="text/javascript" src="<?php echo(base_url().MEDIAPATH)?>edit_area/edit_area_full.js"></script>
<script>
var fileName='';
function open_file(fileName)
{
    try{
        AjaxRequest("<?php echo current_url()?>",'POST',{'type':"getFile",name:fileName},function(req,flag,json){
            if(flag=='s')
            {
                
                if(json['closeFile']!=''){
                    editAreaLoader.closeFile('editbox',json['closeFile']);
                }
                editAreaLoader.openFile('editbox', json);
            }
        });
    }catch(e){alert(e.message);}
}

function my_save(id, content){
   AjaxRequest("<?php echo current_url()?>",'POST',{'type':"saveFile",'content':content});
}

function my_load(id){
    editAreaLoader.setValue(id, "The content is loaded from the load_callback function into EditArea");
}

Event.observe(window,'load',function(){


editAreaLoader.init({
			id: "editbox"	// id of the textarea to transform	
            ,start_highlight: true	
			,allow_resize: "y"
			,allow_toggle: false
			,language: "zh"
			,toolbar: "save, |, charmap, |, search, go_to_line, |, undo, redo, |, select_font, |, change_smooth_selection, highlight, reset_highlight, |, help"
            ,syntax_selection_allow: "css,html,js,php,python"
			,load_callback: "my_load"
			,save_callback: "my_save"
			,plugins: "charmap"
			,charmap_default: "arrows"
		});
});

</script>

<div>
<table width="100%;">
<tr> <td><textarea name="editbox" id="editbox" style="height: 350px; width: 100%;" >
</textarea></td>
<td width="150" valign="top" nowrap>
<p><b>模版文件修改</b></p>
[<?php echo($name);?>]
<?php if($iswritable == false):?>
<font color="#ff0000">模版目录不可写!</font>
<?php endif;?>
<p>
<?php foreach($file_list as $file):?>
<a href="javascript:void(0)" onclick="open_file('<?php echo $file ?>')" tile="<?php echo($file)?>"><?php echo $file;?></a><br/>    
<?php endforeach;?>
</p>
</td>
</tr>
</table>

</div>