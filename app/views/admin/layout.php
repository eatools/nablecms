<?php include 'header.php'?>

<script type="text/javascript" >
var _helpmess = ['P.S:我尽量把所有的按钮或链接放在屏幕的右边，这样你鼠标可以移动最少的距离完成所需的操作！',
                 'P.S:浏览器中的前进后退等功能，在这个后台操作中，<B>不会引起您的不适！</b>',
                 '适当的应用浏览器的前进或后退功能，你会发现她很有意思，特别是在完成某个操作的时候！',
                 '节目中的[<img src="<?php echo base_url()?>media/images/icon/refresh.png">刷新] 是用做局部界面更新的，我在尽量让这个功能变成摆设。',
                 'eaools.cn的作品注重的是用户体验！所以，您有什么好的意见和建议，请随时提出！'
                    ];  
var _now_help=0;
function getHelp()
{
   if(typeof(_helpmess[_now_help])!='undefined')
    {
        $('helpbox').innerHTML = _helpmess[_now_help];
        _now_help++;

   }else{
        _now_help=0;
   }
    setTimeout(getHelp,30000);
}

function hideMenu3(obj)
{
    var men3 = $('menu3Box');
    if(men3.getStyle('display')=='none')
    {
        obj.innerHTML='<img src="<?php echo base_url()?>media/images/icon/tools.gif">隐藏边栏>>';
        men3.show();
    }
    else
    {
        obj.innerHTML='<img src="<?php echo base_url()?>media/images/icon/tools.gif">显示边栏<<';
        men3.hide();
    }

}


    var menuList = <?php echo json_encode($menu)?>;
    var _label_but;

    function labelBut(cssName)
    {
        var list = document.getElementsByClassName(cssName);
        _label_but=list[0];
        for(var x=0;x<list.length;x++)
        {
            $(list[x]).on('click',function (event){
                    if(typeof(_label_but)!='undefined') _label_but.removeClassName('open');
                    $(this).addClassName('open');
                    _label_but=$(this);
                    $('frameMain').src=$(this).getAttribute('link');
                });
        }
    }

    function appendMainMenuBut(kid,k){
        k='m_'+k;
        if(typeof(menuList[kid][k])!='undefined')
        {
            var menuHTML='';
            ml = menuList[kid][k];
            for(var x=0;x<ml.length;x++){
                if (x==0)
                {
                    var css = 'class="labels open"';
                    $('frameMain').src=ml[x]['url'];
                }else var css = 'class="labels"';

                if(ml[x]['is_param']!=1){
                    menuHTML+='<div link="'+ml[x]['url']+'" '+css+' >'
                            +ml[x]['title']
                            +'</div>';
                }
                
            }
            $('mainMenuBut').innerHTML=menuHTML;
        }
        labelBut('labels');
    }
    Event.observe(window,'resize',function(){
        $('frameMain').style.height = (Element.getHeight(document.body)-170)+"px";
    });



    Event.observe(window,'load',function(){
        getHelp();
        labelBut('labels');
        $('frameMain').style.height = (Element.getHeight(document.body)-170)+"px";
        //主菜单
        var menuHTML='';
        for(var pid=0;pid<menuList.length;pid++){
            var ml =menuList[pid]['m_0'];
            for(var x=0;x<ml.length;x++){
                menuHTML+='<div class="labelCss" style="margin: 10px 10px 0;">'
                        +'<div class="open">'+ ml[x]['title'] +'</div>'
                        +'</div>';
                if(typeof(menuList[pid]['m_'+ml[x]['id']])=='undefined'){
                        continue;
                }
                for(var n=0 ;n<menuList[pid]['m_'+ml[x]['id']].length;n++)
                {
                    
                    menuHTML+='<div><a onclick="appendMainMenuBut('+pid+','+menuList[pid]['m_'+ml[x]['id']][n]['id']+')">'+menuList[pid]['m_'+ml[x]['id']][n]['title']+'</a></div>';
                }
            }
        }

        $('menu3').innerHTML=menuHTML;
    });

    

</script>
<style>
#mainMenuBut div{
    float:right;
    margin-right:4px;
}
</style>
<body>
<table class="layoutCss" border=0 cellpadding=0 cellspacing=0  width=100% >
    <tr>
        <td class="header" style="height:60px;" height=60 >

        <img style="float:left;"src="<?php echo base_url()?>media/images/logo.png" >
        <span class="header_right" style="float:right;"><?php echo anchor(ADMIN_ROUTES,'欢迎界面')?> | 收藏 | <a target="_blank" href="http://www.eatools.cn">官网</a> | 帮助</span>
        </td>
    </tr>
</table>
<table class="layoutCss"  border=0 cellpadding=0 cellspacing=0  width=100%  height="75%"  >
    <tr>
        <td valign="top"  align="left"  class="main" id="main">

        <table border=0 cellpadding=0 cellspacing=0  width=100%  ><tr><td >
            <a style="float:left;" id="helpbox">P.S:我尽量把所有的按钮或链接放在屏幕的右边，这样你鼠标可以移动最少的距离完成所需的操作！</a>

            
            <a class="but" style="float:right;" onclick="hideMenu3(this)"  ><img src="<?php echo base_url()?>media/images/icon/tools.gif">隐藏边栏>></a>
            <a class="but" style="float:right;" onclick="frameMain.window.location.reload()" ><img src="<?php echo base_url()?>media/images/icon/refresh.png">刷新</a>           
            <a class="but" style="float:right;" onclick="frameMain.window.history.back(-1)" ><img src="<?php echo base_url()?>media/images/icon/backward.png">后退</a>
            
        </td></tr></table>

        <div class="labelCss" >
         <span id="mainMenuBut">
         <div class="labels open">欢迎界面</div>
         </span>
        </div>
        <iframe class="main_mian" id="frameMain" name="frameMain"  style="height:100%;" frameborder=0 marginwidth=0 marginheight=0  width="100%" height="100%"  src="<?php echo site_url(ADMIN_ROUTES.'/welcome')?>" >
            您的浏览器不支持框架！请使用firefox /IE6(更高) 等通用浏览器.eatools.cn
        
        </iframe>
        </td>
        <td class="menu3" valign="top"  id="menu3Box" style="display:auto;">
            <div class="menu3_top">
                <div class="create_icon"><?php echo anchor(ADMIN_ROUTES.'/account/editmy/','个人信息',"target='frameMain'")?></div>
                <div class="exit_button"><?php echo anchor(ADMIN_ROUTES.'/index/loginout/','退出')?></div>
            </div>

        
            <span id="menu3"  >
                
                <img src="<?php echo base_url()?>/media/images/loading.gif" >载入菜单...
            </span>

        </td>
    </tr>
    </table>
<table class="layoutCss" border=0 cellpadding=0 cellspacing=0  width=100% >
    <tr>
        <td  class="footer" colspan="2" valign="top">
        &copy Copyright <a target="_blank" href="http://www.eatools.cn">eatools.cn </a>
        </td>
    </tr>
</table>


</body>
</html>
