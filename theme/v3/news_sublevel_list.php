<?php include "header.php" ?>
<?php $this->load->helper('news_helper');?>
<?php $sPage = page_menu_get_list($pageInfo->id); ?>

<div id="content" >

    <div id="main" >

<?php foreach($sPage->result() as $item): ?>
<dl class="bd1" style="margin:10px 0;">
<h1><?php echo $item->title ?>  </h1>
    
<?php $newsList = news_content_in_top($item->id,3);?>
<?php foreach($newsList->result() as $newsItem): ?>


<h2><?php echo anchor($item->uri.'/content/'.$newsItem->id,$newsItem->title)?></h2>
<h3><?php echo date('y.m.d',$newsItem->create_time)?></h3>
<p> 
    <?php echo mb_substr(strip_tags($newsItem->content),0,300,'UTF-8')?> 
    <?php echo anchor($item->uri.'/content/'.$newsItem->id,'more...')?> </font>
</p>

<?php endforeach;?>
<?php endforeach;?>


    </div>
    <?php include "sub.php"?>



</div>

<?php include "footer.php" ?>