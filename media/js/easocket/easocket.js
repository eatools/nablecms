var EaSocket = Class.create();
EaSocket.prototype ={
    
    'initialize':function(){

    },

    'send':function(url,method,param){
        var conf = {
            'method':method,
            'parameters':param,
            'onCreate':this.onCreate,
            'onComplete':this.onComplete,

        }

        this.s =new Ajax.Request(url,conf);
    },
    'onComplete':function(){
    
    }
}