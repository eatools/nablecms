/**
 * EAEditor
 * ============================================================================
 * 版权所有 (C) 2010 eatools.cn，Able Gao 并保留所有权利。
 * 网站地址: eatools.cn
 * ============================================================================
 * $Version: v1.0.0 Beta
 * $Author: Able Gao <ablegao@gmail.com> $
 * $Date: 2009-12-7 11:58 $
 * $Id: index.php 2009-12-7 11:58 Able Gao $
*/

/**
 * EAEditor div 版
 * ============================================================================
 * 版权所有 (C) 2010 eatools.cn，Able Gao 并保留所有权利。
 * 网站地址: eatools.cn
 * ============================================================================
 * $Version: v1.0.0 Beta
 * $Author: Able Gao <ablegao@gmail.com> $
 * $Date: 2009-12-7 11:58 $
 * $Id: index.php 2009-12-7 11:58 Able Gao $
*/

var EaEditor = Class.create();
EaEditor.prototype = {
    resize:true,
    css:undefined,
    initialize:function(id,css){
        if(typeof($(id))=='undefined') alert(id+"标签不存在！");
        this.textBoxId = id;
        this.css = css;
    },
    create:function(){
        this.iframeName  = this.textBoxId + '_eatools';
        html = '<div style="overflow-y:hidden;" ';
        if(typeof(this.css)!='undefined') html += ' class="'+this.css+'"';
        html += ' name="'+this.iframeName+'"';
        html += ' id="'+this.iframeName+'"';
        if(typeof(exp)!='undefined') html += " "+exp+" ";
        html += ' allowTransparency= true contentEditable=true';
        html += '></div> ';
        document.writeln(html);
        $(this.textBoxId).setStyle({"display":"none"});
        Event.observe($(this.iframeName),'blur',function(){$(this.textBoxId).value = this.getInnerHTML();}.bind(this));
        
    },
    //写入参数
    write:function(html){
        $(this.iframeName).innerHTML += html;
    },
    getInnerHTML:function(){
        return $(this.iframeName).innerHTML;
    },
    
    cleanInnerHTML:function(){
        $(this.iframeName).innerHTML    = '';
        $(this.textBoxId).value         = '';
    }
}
