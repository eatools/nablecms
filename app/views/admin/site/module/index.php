<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th>编号</th>
    <th>模块名称</th>
    <th>文件名</th>
    <th>备注</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>

<tr class="tr_bg">
    <td><?php echo $row->id ?></td>
    <td><?php echo $row->title ?></td>
    <td><?php echo $row->module_name ?></td>
    <td><?php echo $row->remark ?></td>
    <td>
    <?php echo anchor(ADMIN_ROUTES.'/sitemodule/edit/'.$row->id,'修改')?>
    <?php echo anchor(ADMIN_ROUTES.'/sitemodule/delete/'.$row->id,'删除')?></td>
 </tr>
<?php endforeach; ?>
</table>