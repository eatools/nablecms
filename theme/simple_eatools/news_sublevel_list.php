<?php

/*
 * 新闻下级分类内容列表显示页
 *=============================================================
 * 版权所有: (c) eatools.cn Able Gao 保留所有权利
 * 网站地址: http://www.eatools.cn
 *=============================================================
 * $Version: 
 * $Create : 2010-07-11 10:48 Able Gao <ablegao@gmail.com>
 * $Edit   : 2010-07-11 10:48
 * $File   : news_sublevel_list.php
*/
?>
<?php include dirname(__FILE__).'/header.php' ?>

<center>
<div class="div1">

<?php $this->load->helper('news_helper');?>

<div class="menuleft">
<?php
$sPage = page_menu_get_list($pageInfo->id);
foreach($sPage->result() as $item)
{
    echo '<dl class="bd1" style="margin:10px 0;">
            <dt>'.anchor($item->uri,$item->title, "style='color:#444444;'").'</dt>
            ';
    $newsList = news_content_in_top($item->id,3);
    foreach($newsList->result() as $newsItem)
    {
        ?>
    <dd style="border-bottom:1px dotted #eeeeee;"> 
    <font style="font-size:14px;colro:#333333;"><?php echo anchor($item->uri.'/content/'.$newsItem->id,$newsItem->title)?>  </font>
        <br/><font style="color:#aa0000;">[<?php echo date('m.d',$newsItem->create_time)?>]</font>
        <font color="#777777" style="font-size:12px;"> <?php echo mb_substr(strip_tags($newsItem->content),0,300,'UTF-8')?> <?php echo anchor($item->uri.'/content/'.$newsItem->id,'more...')?> </font>
    </dd>
        <?php

    }
    echo '</dl>';
}
?>
</div>

<?php include dirname(__FILE__).'/right.php'?>


</div> <!-- div1 end -->
</center>

<?php include dirname(__FILE__).'/footer.php' ?>
