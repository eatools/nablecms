<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th>编号</th>
    <th>分类</th>
    <th>名称</th>
    <th>地址</th>
    <th>target</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>

<tr class="tr_bg">
    <td align="center"><?php echo $row->id ?></td>
    <td align="center"><?php echo $linkscateList[$row->cate_id]?></td>
    <td><?php echo $row->title ?></td>
    <td><?php echo $row->url ?></td>
    <td><?php echo $row->target ?></td>
    <td align="center">
    <?php echo admin_list_button("links",'ed',$row->id)?></td>
 </tr>
<?php endforeach; ?>
</table>
