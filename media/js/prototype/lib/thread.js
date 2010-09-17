/**
Ajax连接请求约束处理类
Thread
Author:Able
document:
    var thread=new Ajax.Thread([RequestNum=1]);
    thread.loop();
    thread.AjaxRequest(Ajax.Request([],));
*/
Ajax.Thread=new Class.create(
{
    Author:"Able",
    Version :"0.1",
    threading:{},
    threadObj:[],
    debug:false,
    initialize:function(RequestCount,debug){
        if(RequestCount){
            this.activeRequestCount=RequestCount;
        }else{
            if(Prototype.Browser.IE){
                this.activeRequestCount=2;
            }else{
                this.activeRequestCount=4;
            }
        }
        if(debug){
           this.debug=debug;
        }
    },
    setRequestCount:function(num){
        this.activeRequestCount=num;
    },
    /*
       追加请求
    */

    AjaxRequest:function(methodURL,option){
        try{
        	//alert($H(this.threading));
        	var t=new Date();
            this.threading[t.getTime()]=[methodURL,option,"Request"];
            delete t;
        }catch(e){
            //alert("Thread.AjaxReuqest"+e.message);
            alert("Thread.AjaxReuqest"+e.message);
        }

    },

    SelfRequest:function(type,methodURL,option){
    	try{
			if(this.threading[type]){}else{
				this.threading[type]=[];
			}
			this.threading[type]=[methodURL,option,"Request"];

    	}catch(e){
    		alert( "Thread.FirstRequest"+e.message);
    	}
    },
    /*
    循环处理
    */
    loop:function(looptime){
        try{
        if(looptime){
            this.looptime=looptime;
        }else{
            this.looptime=3000;
        }

        this.Interval=setInterval(function(){
            try{
            if(this.debug==true && this.rundebug){
                this.rundebug();
            }
            this._makeRequest();
            }catch(e){
                alert(e.message);
            }
        }.bind(this),this.looptime);
        }catch(e){
            alert(e.message);
        }
    },
    _makeRequest:function(){
        try{
            //确定当前请求数量允许继续操作

            this.remnantsRequestCount=this.activeRequestCount-Ajax.activeRequestCount;
            //$H(this.threading).each(function(item){
            for (key in this.threading){
            	var item=this.threading[key];
            	if(this.remnantsRequestCount<=0){
            		return false;
            	}
            	switch(item[2]){
                case "Request":

                 var options=Object.clone(item[1]);
                 var onComplete=options.onComplete;


                 Object.extend(options.onComplete,function(response,json){
                	 if(Object.isFunction(onComplete)) onComplete(response,json);
                 }.bind(this));
                 var onCreate=options.onCreate;
                 if(Object.isFunction(onCreate)){
                	 try{
                	 Object.extend(options.onCreate,function(response,json){
                		 onCreate();
                     }.bind(this));
                	 }catch(e){
                		 alert(e.message);
                	 }
            	 }


                 //this.threadObj.push(new Ajax.Request(item[0],options));
                 new Ajax.Request(item[0],options);
                break;
            	}
            	//this.threading.splice(0,1);
            	this.threading[key]=null;
            	delete this.threading[key];

            	this.remnantsRequestCount--;
            }
            /*
            if(remnantsRequestCount>0){
                if(this.threading[0]){
                    var item=this.threading[0];
                }else{
                    return false;
                }
                switch(item[2]){
                    case "Request":
                     var options=Object.clone(item[1]);
                     var onComplete=options.onComplete;
                     options.onComplete=(function(response,json){
                        if(Object.isFunction(onComplete)) onComplete(response,json);
                     }).bind(this);

                     this.threadObj.push(new Ajax.Request(item[0],options));
                    break;
                }
                this.threading.splice(0,1);
                item=null;
            }else{
                return false;
            }
            */
            //释放内存
            /*
            for(x=0;x<this.threadObj.length;x++){
                if(this.threadObj[x].success()==true){
                    this.threadObj[x]=null;
                    this.threadObj.splice(x,1);
                }
            }*/

        }catch(e){
            alert(e.message);
            //throw "1";
        }
    },
    /*强行关闭处理*/
    close:function(){
        clearInterval(this.Interval);
    },
    start:function(){
    	try{
            this.Interval=setInterval(function(){
                try{
                if(this.debug==true && this.rundebug){
                    this.rundebug();
                }
                this._makeRequest();
                }catch(e){
                    throw e.message;
                }
            }.bind(this),this.looptime);
            }catch(e){
                alert(e.message);
        }
    },
    /*
      安全关闭，
        终止并完成剩余记录。
    */
    safeclose:function(){

    }
});
