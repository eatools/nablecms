<?php 
$this->load->helper('page_helper');
$topMenu = page_menu_get_list(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="" name="Keywords" />
<meta content="" name="Description"/>   
<title><?=$this->config->item('web_name') ?></title>
<?php echo theme_css("style.css")?>


<script type="text/javascript" >
var base_url = "<?php echo base_url()?>";
var media_url= base_url+"<?php echo MEDIAPATH;?>";
</script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/lightbox/css/lightbox.css" />
<script type="text/javascript" src="<?=base_url()?>media/js/prototype/lib/prototype.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/prototype/lib/src/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/prototype/lightbox.js"></script>

</head>
<body>
<div id="header">
 <div id="logo"><span class="l">EA</span><span class="r">TOOLS</span><br/><span class="f">开源项目</span></div>
 
</div>
<div id="menu">
	<ul>
        <?php 
            $paras= $this->uri->segment(1);
            foreach($topMenu->result() as $k=>$item):?>
            <?php 
            $urls = ($item->uri == 'index')?'':$item->uri;
            echo "<li >".anchor($urls,$item->title)."</li>";
            ?>
        <?php endforeach;?>


	</ul>
 </div>