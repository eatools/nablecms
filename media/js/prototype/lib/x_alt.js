/**
* title标签替换 
* author:Able 
* 环境 prototype 1.6.1_rc3 gtziyou修改版(Event.SrcElement )
**/
var moveTitle_Data=new Date();
Event.observe(window,"load",function(){
  var mtName="gcontestMTitle"+moveTitle_Data.getTime();
  if($(mtName)){
    var gcontestMTitle=$(mtName);
  }else{
    var gcontestMTitle=new Element("div",{id:mtName});
    gcontestMTitle.setStyle("border: 1px solid rgb(170, 170, 170); padding: 3px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; position: absolute; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; max-width: 350px; top: 368px; left: 555px; display: none;");
  }
  document.body.appendChild(gcontestMTitle);
  
  Event.observe(document.body,"mousemove",function(event){
   try{
    var mobj=Event.SrcElement();
    if(mobj.title && mobj.title!=""){
        mobj.setAttribute("mtitle",mobj.title);
        mobj.title="";
    }
    if(mobj.getAttribute("mtitle")!="" && mobj.getAttribute("mtitle")!=null){
        gcontestMTitle.style.left=Event.pointerX(event)+10+"px";
        gcontestMTitle.style.top=Event.pointerY(event)+10+"px";
        if(gcontestMTitle.innerHTML!=mobj.getAttribute("mtitle")){
            gcontestMTitle.innerHTML=mobj.getAttribute("mtitle");
        }
        
        /*
        Event.observe(mobj,"mouseout",function(){
        gcontestMTitle.innerHTML=mobj.getAttribute("mtitle");
        Element.hide(gcontestMTitle);
        });
        */
        Element.show(gcontestMTitle);
    }else{
        Element.hide(gcontestMTitle);
    }
    if(gcontestMTitle.innerHTML==""){
        Element.hide(gcontestMTitle);
    }
    }catch(e){
        Element.hide(gcontestMTitle);
    }
  });

});
