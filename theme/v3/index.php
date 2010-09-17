<?php include "header.php" ?>

<div id="content" >

    <div id="main" >


        <?php $this->load->helper('news_helper');?>
        <?php 
        $welcome = news_content_in_top($pageInfo->id,1);
        foreach($welcome->result() as $item):
        ?>
        <h1><?php echo theme_img("pen.png"," height=45 ")?><?php echo $item->title ?></h1>
        <p><?php echo $item->content ?></p>
        <?php endforeach;?>





        <h1><?php echo theme_img("doc.png"," height=45 ")?>最新消息</h1>
        <?php $news = news_no_categroy_top(3);
           foreach($news->result() as $newItem):
           ?>
        <h2 ><?php echo $newItem->title ;?></h2>
        <h3><?php echo date("Y.m.d",$newItem->create_time)?></h3>
        <p ><?php echo mb_substr(strip_tags($newItem->content),0,300,'UTF-8')?><?php echo anchor("news/$newItem->id","more...")?> </p>
       
       <?php endforeach;?>

    

    </div>
    <?php include "sub.php"?>



</div>

<?php include "footer.php" ?>