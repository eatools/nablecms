/*
EAFramework copyright 2009-2010
eatools.cn
*/
var getNextPage=function(){
		
}
CKEDITOR.dialog.add( 'eaimage', function( editor )
{
    
	return {
		title : '插入图片',
		minWidth : 390,
		minHeight : 230,
		contents : [
			{
				id : 'tab2',
				label : '文件列表',
				elements :
				[
                 {
                        
                        type : 'html',
                        html:'<div style="width:100%;height:196px;"> '
                        +'选择您要插入到窗体的文件!<br/><iframe  name="fileList" id="fileList" '
                        +' border="0" frameborder="no"   marginwidth="0" style="width:100%;height:196px;"'
                        +' src="'+Ea_ajaxPath+'?mod=files&bin=index&act=list&type=image" >'
                        +' </iframe>'
                        +'</div>',
                        label:'选择文件'
                 }
				]
			},
			{
				id : 'tab1',
				label : '上传文件',
				elements :
				[	{
					type : 'file',
					id:'newfile',
					
					action:Ea_ajaxPath+'?mod=files&bin=index&act=add&type=ckeditor',
					label:'选择上传文件'
					},
					{
					 id:'uploadsub',
					 type:'fileButton',
					 title:'上传到服务器!',
					 label:'上传',
					 'for':['tab1','newfile']
					}
				]
			}
			
		],
		onOk:function(){
			//alert(top.selectFile);
            if(typeof(top.selectFile)!='undefined' && top.selectFile!=''){
                editor.insertHtml("<img src='"+top.selectFile+"'>");
                top.selectFile='';
            }
            if(typeof(window.frames["fileList"].document)!='undefined'){
                //alert(.src);
                try{
               var list=Form.getInputs(window.frames["fileList"].document.listForm,'checkbox','checkList[]');
               htmls='';
               for(var i=0;i<list.length;i++){
                if(list[i].checked==true){
                  htmls+="<img src='"+list[i].value+"' >";
                }
               }
                editor.insertHtml(htmls);
               }catch(e){
                alert(e.message);
               }
            }
		}
		
	};
} );

/*
CKEDITOR.dialog.add( 'eaimage', function( editor )
{
	return {
		title : '文件上传',
		minWidth : 390,
		minHeight : 230,
		contents : [
			{
				id : 'tab1',
				label : '',
				title : '',
				expand : true,
				padding : 0,
				elements :
				[
					{
						type : 'html',
						html :'<iframe src="http://www.baidu.com"></iframe>'
					}
				]
			}
		],
		buttons : [ CKEDITOR.dialog.cancelButton ]
	};
} );
*/