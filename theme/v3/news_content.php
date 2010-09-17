<?php include "header.php" ?>
<?php $this->load->helper('news_helper');?>
<?php $newsInfo = news_content($PageNum); ?>

<div id="content" >

    <div id="main" >
        <h1><?php echo $newsInfo->title ?></h1>
        <h3><?php echo date('y.m.d',$newsInfo->create_time)?></h3>
        <p><?php echo $newsInfo->content;?></>

    </div>
    <?php include "sub.php"?>



</div>

<?php include "footer.php" ?>