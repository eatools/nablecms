<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th>编号</th>
    <th>名称</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>

<tr class="tr_bg">
    <td align="center"><?php echo $row->id ?></td>
    <td><?php echo $row->title ?></td>

    <td align="center">
 <?php echo anchor(ADMIN_ROUTES.'/linkscate/edit/'.$row->id,'修改')?>
 <?php echo anchor(ADMIN_ROUTES.'/linkscate/delete/'.$row->id,'删除')?></td>
 </tr>
<?php endforeach; ?>
</table>