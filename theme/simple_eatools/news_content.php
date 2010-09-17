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
<center>
<div class="div1">

<?php $this->load->helper('news_helper');?>
<div class="menuleft">
<dl class="bd1">
<?php $newsInfo = news_content($PageNum); ?>
    <dt > 
    <font style="font-size:14px;"><?php echo $newsInfo->title ?>  </dt>
        <dd style="border-bottom:1px dotted #eeeeee;">
        <font style="color:#eeeeee;">[<?php echo date('m.d',$newsInfo->create_time)?>]</font><br/>
        <?php echo $newsInfo->content;?>
    </dd>

</dl>

</div>

<?php include dirname(__FILE__).'/right.php'?>

</div>
</center>
<?php include dirname(__FILE__).'/footer.php' ?>
