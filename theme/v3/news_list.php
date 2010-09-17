<?php include "header.php" ?>

<div id="content" >

    <div id="main" >


        <?php $this->load->helper('news_helper');?>
        
        <?php
    $newsList = news_page_list($pageInfo->id,10,$PageNum);

            foreach($newsList->result() as $newsItem)
            {
                ?>
            <h1> 
            <?php echo anchor($pageInfo->uri.'/content/'.$newsItem->id,$newsItem->title)?>
            <h3><?php echo date('y.m.d',$newsItem->create_time)?><h3>
            <p>
            <?php echo $newsItem->content ?> <!-- ?php echo mb_substr(strip_tags($newsItem->content),0,300,'UTF-8')?-->
            </p>
        <?php

            }
        ?>
        <p>
        <?php

        $pages = pagination(news_page_list_count($pageInfo->id) ,site_url($pageInfo->uri), $PageUri,10);
        echo $pages->create_links();
        ?>
        </p>
    </div>
    <?php include "sub.php"?>



</div>

<?php include "footer.php" ?>