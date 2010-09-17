<style>
 .themeBox {
 
 float:right;margin:4px;background:#deeaf8;
 
 }
 .themeBox .themeImg {}
 .themeBox .themeImg img{margin:3px;width:150px;height:140px; }
 .themeBox .themeTitle {text-align:center;font-size:12px; margin:3px;}
</style>
<script>
function changeTheme(na)
{
    AjaxRequest("<?php echo site_url(ADMIN_ROUTES."/sitetheme/usetheme")?>/"+na,'GET','',function(request,flag,json){
        if(flag=='s'){
           location.href='<?php echo site_url(ADMIN_ROUTES.'/sitetheme/index')?>';
        }
    });
}
</script>
<?php foreach($themelist as &$item ): ?>
<div class="themeBox">
<div class="themeImg" >
<img src="<?php echo EA_BASE_URL.THEMEPATH.$item[0].'/'.$item[1]['thumbnail']; ?>" >
</div>
<div class="themeTitle"> <?php echo  $item[1]['name'] ?> 

<?php
if($use_theme == $item[0])
{
   ?>
    <font color="#dd0000">[使用]</font>
   <?php
}else
{
?>
<a href="javascript:changeTheme('<?php echo $item[0]?>')">应用</a>
<?php
}
?>
 <?php echo(anchor(ADMIN_ROUTES.'/sitetheme/edit/'.$item[0],"编辑"))?>
</div>
</div>
<?php endforeach; ?>
