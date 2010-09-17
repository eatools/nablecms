<?php

/*
 * 新闻内容列表显示页
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
<?php $this->load->helper('news_helper');?>
<center>
<div class="div1">
<div class="menuleft">
<?php
    $newsList = news_page_list($pageInfo->id,10,$PageNum);

    foreach($newsList->result() as $newsItem)
    {
        ?>
        
<dl class="bd1">
    <dt > 
    <font style="font-size:14px;"><?php echo anchor($pageInfo->uri.'/content/'.$newsItem->id,$newsItem->title)?>  </dt>
        <dd style="border-bottom:1px dotted #eeeeee;">
        <font style="color:#aa0000;">[<?php echo date('m.d',$newsItem->create_time)?>]</font><br/>
        <font color="#666666" style="font-size:12px;"><?php echo $newsItem->content ?> <!-- ?php echo mb_substr(strip_tags($newsItem->content),0,300,'UTF-8')?--></font>
        <br/>
    </dd>
</dl>
<br/><br/>
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

<?php include dirname(__FILE__).'/right.php'?>

</div> <!-- div1 end -->
</center>
<?php include dirname(__FILE__).'/footer.php' ?>
