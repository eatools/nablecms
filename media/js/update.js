/**
 * 更新模块
 */
 
function MBHtml(jsonConf)
{
    html = '<div class="wbList" id="mb_'+jsonConf['id']+'" >'
    
      +'<div class="wbTitle">'
      +'<img class="face" style="margin:10px;float:left;" src="'+jsonConf['face']+'">'
      +'<a href="#" style="font-weight:bold;font-size:14px;" >'+jsonConf['nickname']+'</a>'
      +'&nbsp;&nbsp;'+jsonConf['info']['create_time']+'<br/>'
      +'<span id="blog_content_'+jsonConf['info']['id']+'">'+jsonConf['info']['blog']+'</span>'
      +'</div><div>'
      +'<a href="">评论</a> <a>顶</a> <a>操作</a>'
      +'</div>'
      +'<div class="wbFooter" id="reply_'+jsonConf['info']['id']+'"></div></div>';

    return html;
}
function replyHtml()
{
    
}
var AutoUpdate = new Class.create();
AutoUpdate.prototype = {
    thread:[],
    max:1,
    divBox:null,
    url:null,
    infoUrl:null,
    initialize:function(divName,url){
        this.divBox = divName;
        this.url = url;
    },
    start:function(){
        this.ajax();
    },
    ajax:function()
    {
        if(this.url==null) return false;
        new Ajax.Request(this.url,{method:"GET",onCreate:function(){},onComplete:this.ajaxOnComplete.bind(this)});
    },
    ajaxOnComplete:function(request){
        try{
            var res = request.responseText;
            var par = /^[0-9,]+$/;
            if(par.exec(res))
            {
               var conf = res.split(',');
               this.ListConf = conf;
               this.ListConfIndex=0;
               this.infoAjax();
               return false;
            }
        
        }catch(e){alert("ajaxOnComplete Error:"+e.message);}
    },
    getMess:function(messid)
    {
        new Ajax.Request(this.infoUrl+"/"+messid,{"method":"GET",onComplete:this.getMessOnComplete.bind(this)});
    },
    getMessOnComplete:function(request)
    {
        try{
             var res = request.responseText;
             if(res!='0')
             {
                 $(this.divBox).innerHTML= MBHtml(res.evalJSON())+$(this.divBox).innerHTML;
             }
            }catch(e){alert(e.message);}
    },
    infoAjax:function(){
        this.getMess(this.ListConf[this.ListConfIndex]);
        this.ListConfIndex++;
        if(typeof(this.ListConf[this.ListConfIndex])!='undefined')
         {
            this.infoAjax();    
         }
    }
}