<?php include dirname(__FILE__).'/header.php' ?>


<center>
<div class="div1">


<div class="menuleft">
<?php $this->load->helper('news_helper');?>


<?php 
$welcome = news_content_in_top($pageInfo->id,1);
foreach($welcome->result() as $item):
?>
<dl class="bd1">
    <dt><?php echo $item->title ?></dt>
    <dd ><?php echo $item->content ?></dd>
</dl>
<?php endforeach;?>

<br/>


<dl class="bd1">
    <dt>更新动态</dt>
    
    <dd>
   <?php $news = news_no_categroy_top(3);
   foreach($news->result() as $newItem):
   ?>
   
   	<h1 class="h1s"><?php echo $newItem->title ;?></h1>
   	<p class="p1"><?php echo mb_substr(strip_tags($newItem->content),0,300,'UTF-8')?>
   	<br/>
   	<?php echo anchor("news/$newItem->id","(查看详细)")?> 发布时间：<?php echo date("Y-m-d",$newItem->create_time)?> 
   	</p>
   
   <?php endforeach;?>
   </dd>
   
</dl>
</div>

<?php include dirname(__FILE__).'/right.php' ?>

</div>


</center>
<?php include dirname(__FILE__).'/footer.php' ?>
