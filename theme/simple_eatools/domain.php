<?php

/*
 * 域名转让
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-07-11 10:48 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-07-11 10:48
 * $File   : domain.php
*/
?>
<?php include dirname(__FILE__).'/header.php' ?>
<?php $this->load->helper('news_helper');?>
<center>
<div class="div1">


<div class="menuleft">
<?php

    
    $newsList = news_content_in_top($pageInfo->id,3);
    foreach($newsList->result() as $newsItem)
    { ?>
    <dl class="bdl" style="width:290px;float:left;margin-right:10px;">
        <dt><?php echo $newsItem->title ?></dt>
        <dd style="border-bottom:1px dotted #eeeeee;"> 
            <font style="color:#eeeeee;">[<?php echo date('m.d',$newsItem->create_time)?>]</font>
            <font color="#aaaaaa" style="font-size:11px;"> <?php echo $newsItem->content;?></font>
        </dd>
    </dl>
        <?php
    }
    
?>
</div>

<?php include dirname(__FILE__).'/right.php' ?>

</div>


</center>
<?php include dirname(__FILE__).'/footer.php' ?>
