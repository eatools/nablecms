/**
 * able gao
 * */
//table 鼠标标签，当mouse 移动过来和移出时，显示标签中关联的标签对象
var _on_mouse_over_obj;
function OnMouseOverShow(ClassName,linkName){

    if(typeof(linkName)=='undefined'){
        var linkName='mouse_link_id';
    }

    var list = document.getElementsByClassName(ClassName);
    try{
    if(typeof(list.length)!='undefined'){

        for(var x=0;x<list.length;x++){
            if(list[x].getAttribute(linkName)!=null)
            {
                list[x].onmouseover=function(){
                    if(typeof(_on_mouse_over_obj)!='undefined') _on_mouse_over_obj.hide();
                    _on_mouse_over_obj= $(this.getAttribute(linkName));
                    _on_mouse_over_obj.show();
                }
            }
        }
    }
    delete list;
}catch(e){
        alert(e.message);
    }
}