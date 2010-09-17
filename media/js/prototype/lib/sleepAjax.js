/****
 *
 *
Ajax连接请求延迟处理类
* *
*****
***/
var sleepAjax=new Class.create({
    Author:"Able",
    Version :"0.1",
    RequestList:{},
    sleepTime:2000,
    initialize:function(){
        if(Prototype.Browser.IE){
                this.activeRequestCount=2;
        }else{
                this.activeRequestCount=4;
        }
        if(typeof(sleeptime)!='undefined'){
            this.sleepTime=sleeptime;
        }
    },
    request:function(url,options){
      try{
         this.remnantsRequestCount=this.activeRequestCount-Ajax.activeRequestCount;
         var onComplete=options.onComplete;
         Object.extend(options.onComplete,function(response,json){
             if(Object.isFunction(onComplete)) onComplete(response,json);
         }.bind(this));
         //
         if(typeof(options.onCreate)!='undefined'){
             var onCreate=options.onCreate;
             //运行create
             onCreate();
             delete options.onCreate;
         }
         //this.threadObj.push(new Ajax.Request(item[0],options));
         if(this.remnantsRequestCount>0){
         new Ajax.Request(url,options);
         }else{
            setTimeout(function(){
                try{
                this.request(url,options);
                }catch(e){
                    throw e.message;
                }
            }.bind(this),this.sleepTime);
         }

     }catch(e){
        throw e.message;
     }
    }
});