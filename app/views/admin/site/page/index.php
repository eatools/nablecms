<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th>编号</th>
    <th>上级</th>
    <th>名称</th>
    <th>URI</th>
    <th>缓存时间</th>
    <th>模版</th>
    <th>排序</th>
    <th>有效</th>

    <th>操作</th>
 </tr>
<?php foreach($list as &$row): 
?>

<tr class="tr_bg">
    <td align="center"><?php echo $row->id ?></td>
        <td><?php echo $row->pid ?></td>
    <td><?php echo $row->title ?></td>
    <td><?php echo $row->uri ?></td>
    <td align="right"><?php echo $row->cache_time ?>分</td>
    <td ><?php echo isset($siteThemeConf['tpl']['default'][$row->tpl])
                    ? $siteThemeConf['tpl']['default'][$row->tpl]
                    :'无';
                    ?></td>
    <td><?php echo $row->orderby ?></td>
    <td align="center">
    <?php echo admin_static(($row->is_del==1)?0:1)?>
    </td>
    <td align="center">
 <?php echo anchor(base_url().'index.php/'.$row->uri,'预览',' target="_blank" ')?>
<?php echo admin_list_button("sitepage",'aed',$row->id)?>
</td>
 </tr>
<?php endforeach; ?>
</table>
