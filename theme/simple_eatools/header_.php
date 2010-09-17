<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="" name="Keywords" />
<meta content="" name="Description"/>   

<title><?=$this->config->item('web_name')?></title>

<?php echo css_link("style.css")?>

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
<style>
    body{margin:0px;}
    #load_message{margin:2px;border:1px solid #aaeea9;background:#ffefa9;padding:4px;}
</style>
<div id="load_message" style="display:none;"></div>