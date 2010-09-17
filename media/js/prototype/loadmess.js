var state_code={
0:'没有被初始化！',
1:'服务器链接失败。',
2:'数据已经提交，但服务器没有响应。',
3:'正在处理服务器数据',
4:'操作成功!!'
/*
100:'客户必须继续发出请求',
101:'客户要求服务器根据请求转换HTTP协议版本',
200:'操作成功!!',
201:'提示知道新文件的URL',
202:'接受和处理、但处理未完成',
203:'返回信息不确定或不完整',
204:'请求收到，但返回信息为空',
205:'服务器完成了请求，用户代理必须复位当前已经浏览过的文件',
206:'服务器已经完成了部分用户的GET请求',
300:'请求的资源可在多处得到',
301:'删除请求数据',
302:'在其他地址发现了请求数据',
303:'建议客户访问其他URL或访问方式',
304:'客户端已经执行了GET，但文件未变化',
305:'请求的资源必须从服务器指定的地址得到',
306:'前一版本HTTP中使用的代码，现行版本中不再使用',
307:'申明请求的资源临时性删除',
400:'错误请求，如语法错误',
401:'请求授权失败',
402:'保留有效ChargeTo头响应',
403:'请求不允许',
404:'没有发现文件、查询或URl',
405:'用户在Request-Line字段定义的方法不允许',
406:'根据用户发送的Accept拖，请求资源不可访问',
407:'类似401，用户必须首先在代理服务器上得到授权',
408:'客户端没有在用户指定的饿时间内完成请求',
409:'对当前资源状态，请求不能完成',
410:'服务器上不再有此资源且无进一步的参考地址',
411:'服务器拒绝用户定义的Content-Length属性请求',
412:'一个或多个请求头字段在当前请求中错误',
413:'请求的资源大于服务器允许的大小',
414:'请求的资源URL长于服务器允许的长度',
415:'请求资源不支持请求项目格式',
416:'请求中包含Range请求头字段，在当前请求资源范围内没有range指示值，请求也不包含If-Range请求头字段',
417:'服务器不满足请求Expect头字段指定的期望值，如果是代理服务器，可能是下一级服务器不能满足请求',
500:'服务器产生内部错误',
501:'服务器不支持请求的函数',
502:'服务器暂时不可用，有时是为了防止发生系统过载',
503:'服务器过载或暂停维修',
504:'关口过载，服务器使用另一个关口或服务来响应用户，等待时间设定值较长',
505:'服务器不支持或拒绝支请求头中指定的HTTP版本'
*/
}
var img_yes  = base_url+"media/images/yes.gif";
var img_no   = base_url+"media/images/drop.png";
var img_load = base_url+'/media/images/loading.gif';
var LoadDivClass  = new Class.create();
LoadDivClass.prototype = {
    Author:"Able http://www.eatools.cn",
    Version :"0.1",
    loadImages:'<img src="'+img_load+'" >',

    initialize:function(){
        
    },
    setBox:function(boxName){
        this.div= $(boxName);
    },
    appendHTML:function(html){
        this.div.innerHTML+=html;
    },
    show:function(html){
        try{
        //this.div.setStyle({"top":(document.documentElement.scrollTop-2)+"px"});
        Element.show(this.div);
        if(typeof(html)!='undefined'){
            load_div.setHTML(html);
        }
        }catch(e)
        {
            alert(e.message);
        }
    },
    hide:function(){
        Element.hide(this.div);
    },
    loading:function(mess){
        var html = (typeof(mess)!='undefined')?mess:'等待...';
        this.show(load_div.loadImages+html);
    },
    
    fade:function(){
        this.div.fade();
    },
    
    setHTML:function(html){
        this.div.innerHTML=html;
    },

    sleep_hide:function(html,time){
        
        if(typeof(time)=='undefined'){
            time=3000;
        }

        if(typeof(html)!='undefined'){
            this.setHTML(html);
        }
        
        if(typeof(this.timeout)!='undefined'){
            clearTimeout(this.timeout);
        }

        this.timeout = setTimeout(function(){
            this.fade();
        }.bind(this),time);
    }
}

var load_div = new LoadDivClass();
///开始载入.
Event.observe(window,'load',function(){
    load_div.setBox('load_message');
});






function AjaxOnCreate(){
    load_div.loading();
}
function AjaxOnComplete(request,fun){

       if(typeof(state_code[request.readyState])!='undefined'){
        load_div.setHTML(state_code[request.readyState]);
       }
       if(request.responseText.isJSON(true)){
           var jsonconf = request.responseText.evalJSON();

           if(typeof(jsonconf['e'])!='undefined'){
                load_div.setHTML('<img src="'+img_no+'" >'+jsonconf['e']);
                var flag='e';
           }
           if(typeof(jsonconf['s'])!='undefined'){
                load_div.setHTML('<img src="'+img_yes+'" >'+jsonconf['s']);
                var flag='s';
           }
           if(typeof(fun)=='function'){
            fun(request,flag,jsonconf);
           }
           load_div.sleep_hide();
       }else{
           load_div.setHTML(request.responseText);
       }

}
function AjaxRequest(url,method,parameters,completeFun,messBoxId){
    try{
        if(typeof(messBoxId) !='undefined'){
            load_div.setBox(messBoxId);
        }
        new Ajax.Request(url,{
            'method':method,
            'parameters':parameters,
            onCreate:AjaxOnCreate,
            onComplete:function(request){
                try{
                    AjaxOnComplete(request,completeFun);
                }catch(e){
                    alert("AjaxRequest onComplete error"+e.message);
                }
             }
        });
    }catch(e){
        alert('AjaxRequest Error:'+e.message);
    }

}

function FormRequest(form,fun,messBoxId){
    try{
        if(typeof(messBoxId) !='undefined'){
            load_div.setBox(messBoxId);
        }
        var objects={
               onCreate:function(){
                    AjaxOnCreate();
                    Form.disable(form);
                },
               onComplete:function(request){
                  try{
                   Form.enable(form);
                   AjaxOnComplete(request,fun);

                  }catch(e){
                    alert('FormRequest#'+form.name+"#onComplete Error:"+e.message);
                  }
               }
            }

        Form.request(form,objects);
    }catch(e){
        alert(e.message);
    }
}
