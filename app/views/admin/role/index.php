<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th width="30">编号</th>
    <th>角色名称</th>
    <th>说明</th>
    <th>创建时间</th>
    <th>最后修改时间</th>
    <th>最后修改人</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>

<tr class="tr_bg">
    <td><?php echo $row->role_id ?></td>
    <td><?php echo $row->title?></td>
    <td><?php echo $row->remark ?></td>
    <td><?php echo date('Y-m-d H:i:s',$row->create_time)?></td>
    <td><?php echo date('Y-m-d H:i:s',$row->edit_time)?></td>
    <td><?php echo $row->account_id?></td>
    <td><?php echo anchor(ADMIN_ROUTES.'/role/checkjur/'.$row->role_id,'分配权限')?> 
    <?php echo anchor(ADMIN_ROUTES.'/role/edit/'.$row->role_id,'修改')?>
    <?php echo anchor(ADMIN_ROUTES.'/role/delete/'.$row->role_id,'删除')?>
    </td>
 </tr>
<?php endforeach; ?>

</table>
<div><?php echo $this->pagination->create_links();?></div>