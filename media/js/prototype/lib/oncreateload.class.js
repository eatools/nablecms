var OnCreateLoad=Class.create();
OnCreateLoad.prototype={
    initialize:function(){
        var d= new Date();
        this.errorname="OncreateLoad ";
        try{
            
            this.boxname ="oncreateload_"+d.getTime();
            if(document.getElementById(this.boxname)){
                this.boxObject = $(this.boxname);
            }else{
                this.boxObject = new Element("div",{id:this.boxname});
            }
            this.boxObject.innerHTML="等待 ....";
            var t = document.body.offsetHeight -40;
            var l = document.body.clientWidth-200;
            this.boxObject.setStyle("border:1px dotted #000000;padding:3px;height:20px;width:150px;background:#ffffff;position: absolute;z-index:800px;top:"+t+"px;left:"+l+"px;");

        }catch(e){
            alert(this.errorname+"initialize "+e.message);
        }
	},
    show:function(){
        if(document.getElementById(this.boxname)){
            Element.show(this.boxname);
        }else{
            document.body.appendChild(this.boxObject);
        }
    },
    hide:function(){
        Element.hide(this.boxname);
    }
}