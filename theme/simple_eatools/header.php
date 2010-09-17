<?php include dirname(__FILE__).'/header_.php' ;
$this->load->helper('page_helper');
$topMenu = page_menu_get_list(0);

?>
<script>
function addCookie(SiteName,Url) { 　  // 加入收藏
    if (document.all) {
        window.external.addFavorite(Url, SiteName);
    }else if (window.sidebar) {
        window.sidebar.addPanel(SiteName,Url);
    }
}

function addBookmark(title,url,desc)
{
    if (window.sidebar) {
    window.sidebar.addPanel(title, url,desc); //Mozilla browser
    } else if( document.all ) { //IE browser
    window.external.AddFavorite( url, title);
    } else if( window.opera && window.print ) { //not support Now
    return true;
    }
}

</script>

<center>

<div class="div1" style="line-height:26px;text-align:right;">
<a href="http://ablegao.com">Able's Blog </a>
&nbsp;
<a href="http://ablel.com">阿不！</a>
&nbsp;
<a href="http://www.webgamei.com">WebGame游戏开发基地</a>
&nbsp;
<a href="javascript:addBookmark()">设为首页<a/>
<a href="javascript:addCookie('EATools开湃软件','http://www.eatools.cn')">收藏本站</a>
</div>


<div class="div1">
<span class="logo"><?php echo(theme_img('logo.jpg'," title='eatools' alt='EATOOLS开源项目'")) ; ?></span>

<?php foreach($topMenu->result() as $k=>$item):?>
    <?php 
    $urls = ($item->uri == 'index')?'':$item->uri;
    echo anchor($urls,$item->title,"class='headmenu'");
    ?>
<?php endforeach;?>
</div>




</center>
<br/>

