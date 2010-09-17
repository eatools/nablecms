<div class="menuright">

<?php 
$menuids = ($pageInfo->pid>0)?$pageInfo->pid:$pageInfo->id;
$smenu = page_menu_get_list($menuids);

if($smenu->num_rows>0):?>
<dl class="bd1">
<dt>同级信息</dt>
<?php

foreach($smenu->result() as $item):
?>
<dd><?php echo anchor($item->uri,$item->title)?></dd>
<?php endforeach;?>
</dl>
<br/>
<?php endif;?>


<dl class="bd1">
<dt>关于我们</dt>
<dd>
&nbsp;&nbsp;&nbsp;&nbsp;EATools 是一家服务于商务领域，以技术研发为导向，集策划、运营于一身的高素质团队。<br />
团队项目以开源项目为主，涉及的行业有纺织品、化妆品、食品、教育、娱乐，内容包括在线交易、成本管理、知识管理、CRM、ERP、OA等等。<br />
在项目的管理及风险规避方面，通过多年项目开发及运作的积累，形成了自己的项目管理和服务体系，得到广大客户的推崇。<br />
<br />


</dd>
<dt>VPN/SSH 服务</dt>
<dd>
1. 什么是SSH?<br/>
&nbsp;&nbsp;&nbsp;&nbsp;SSH 是目前较可靠，专为远程登录会话和其他网络服务提供安全性的协议。利用 SSH 协议可以有效防止远程管理过程中的信息泄露问题。<a target="_blank" href="https://www.billchina.net/aff.php?aff=298">免费尝试ssh>></a><br/>
2. 什么是VPN?<br/>
&nbsp;&nbsp;&nbsp;&nbsp;“Virtual Private Network”！虚拟专用网络，可以提供一种通过公用网络安全地对企业内部专用网络进行远程访问的连接方式。<a target="_blank" href="https://www.billchina.net/aff.php?aff=298">注册领取VPN账户>> </a><br/><br/>
</dd>
</dl>
<br/>

<?php $this->load->helper('links_helper');?>
<!-- 友情链接 -->
<dl class="bd1">

<dt>淘宝商铺</dt>
<dd class="flink">
<?php
$links = links_list(2);
foreach($links->result() as $item): ?>
<?php echo anchor($item->url,$item->title,"target=_blank");?>
<?php endforeach;?>
</dd>
</dl>
<br/>


<!-- 友情链接 -->
<dl class="bd1">

<?php $this->load->helper('links_helper');?>

<dt>推荐链接</dt>

<dd class="flink">
<?php
$links = links_list(1);
foreach($links->result() as $item): ?>
<?php echo anchor($item->url,$item->title,"target=_blank");?>
<?php endforeach;?>
</dd>
</dl>

<!-- 友情链接 end -->
<dl class="bd1">

<dt>站内搜索</dt>
<dd>

<script type="text/javascript"><!--
  google_ad_client = "pub-3644820558153413";
  google_ad_format = "js_sdo";
  google_searchbox_width = 200;
  google_searchbox_height = 26;
  google_link_target = 2;
  google_ad_channel = "2297531727";
  google_logo_pos = "above";
  google_button_pos = "below";
  google_ss_domains = "www.eatools.cn";
  google_ad_height = 150;
  google_ad_width = 230;
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_sdo.js">
</script>







</dd>

<dd>




</dd>



</dl>
</div>
