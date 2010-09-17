function getFileWin(Obj){
try{
	var win = new Window({className: "bluelighting",showEffect:Element.show,hideEffect:Element.hide,width:400, height:300,zIndex: 100, resizable: true,title: "选择产品图片",draggable:true, wiredDrag: true});
	var t=new Date();
	
	win.setHTMLContent('<iframe '
				+' style="width:100%;height:93%;background-color:transparent;" '
				+'src="'+Ea_ajaxPath+'?mod=files&bin=index&act=winlist&type=image&t='+t.getTime()+'"'
				+' allowtransparency="true"  '
				+' border="0" frameborder="no" name="winFileList" id="winFileList" marginwidth="0" '
				+'></iframe>');
	var but = new Element('input',{'type':'button',
						  'style':"float:right;height:21px;width:80px;border:0px;background:#ff9933;",
						  'value':'应用'});
	
	
	var closeBut = new Element('input',{'type':'button',
						  'style':"float:right;height:21px;width:80px;border:0px;background:#ff9999;margin-left:3px;",
						  'value':'关闭'});
	closeBut.onclick=function(){
		win.close();
	}.bind(this);win.getContent().appendChild(closeBut);
	
	
	but.onclick=function(){
		if(typeof(top.WinSelectFile)!='undefined'){
			Obj.innerHTML='<input type="hidden" name="select_pic" value="'+top.WinSelectFile[0]+'" >'+top.WinSelectFile[1];
		}
		win.close();
	};
	win.getContent().appendChild(but);
	
	
	win.showCenter();
}catch(e){
	alert(e.message);
}
}

