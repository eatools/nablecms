<?php $this->load->helper('links_helper');?>


    <div id="sub"  >

    <?php 
    $menuids = ($pageInfo->pid>0)?$pageInfo->pid:$pageInfo->id;
    $smenu = page_menu_get_list($menuids);

    if($smenu->num_rows>0):?>
    <h2>同级信息</h2>
    <ul>
    <?php
    foreach($smenu->result() as $item):
    ?>
    <li><?php echo anchor($item->uri,$item->title)?></li>
    <?php endforeach;?>
    </ul>
    <?php endif;?>


    <h2>关于我们</h2>
    <p>
    &nbsp;&nbsp;&nbsp;&nbsp;EATools 是一家服务于商务领域，以技术研发为导向，集策划、运营于一身的高素质团队。<br />
    团队项目以开源项目为主，涉及的行业有纺织品、化妆品、食品、教育、娱乐，内容包括在线交易、成本管理、知识管理、CRM、ERP、OA等等。<br />
    在项目的管理及风险规避方面，通过多年项目开发及运作的积累，形成了自己的项目管理和服务体系，得到广大客户的推崇。<br />
    <br />
    </p>


<h2>推荐淘宝店</h2>
<ul>
<?php
$links = links_list(2);
foreach($links->result() as $item): ?>
<li><?php echo anchor($item->url,$item->title,"target=_blank");?></li>
<?php endforeach;?>
</ul>


<h2>友情链接</h2>
<ul>
<?php
$links = links_list(1);
foreach($links->result() as $item): ?>
<li><?php echo anchor($item->url,$item->title,"target=_blank");?></li>
<?php endforeach;?>
</ul>

</div>