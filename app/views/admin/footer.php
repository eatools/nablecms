<center>
<div class="footerimg">
</div>

<div class="footer">
<div style="float:right;">&copy;eatools.cn Able Gao 京 ICP备10037503号
<script language="javascript" type="text/javascript" src="http://js.users.51.la/3770117.js"></script>
<noscript><a href="http://www.51.la/?3770117" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="http://img.users.51.la/3770117.asp" style="border:none" /></a></noscript>

</div>
友情连接：<br/>
<?php foreach($links_model_getList as $item):?>
<a href="<?php echo $item->url?>" target="<?php echo $item->target?>"><?php echo $item->title?></a>
<?php endforeach;?>
</div>
</center>
</body>
</html>