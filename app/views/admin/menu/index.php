
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th width="30">编号</th>
    
    <th>名称</th>
    <th>路径</th>
    <th  width="30">排序</th>
    <th  width="30">类型</th>
    <th>创建时间</th>
    <th>最后修改时间</th>
   <th>最后修改人</th>
    <th  width="30">状态</th>
    <th>操作</th>
 </tr>
<?php foreach($list as $row): 
?>

<tr class="tr_bg" >
    <td><?php echo $row->id ?></td>
    <td><?php echo $row->title ?></td>
    <td><?php echo $row->url?></td>
    <td><?php echo $row->order?></td>
    <td><?php echo $row->is_param?></td>
    <td><?php echo date('Y-m-d H:i:s',$row->create_time)?></td>
    <td><?php echo date('Y-m-d H:i:s',$row->edit_time)?></td>
    <td><?php echo $row->account_id?></td>
    <td><?php echo ($row->is_del==1)?'禁用':'启用' ?></td>

    <td>
    <?php echo anchor(ADMIN_ROUTES.'/menu/add/'.$row->id,'添加')?>

    <?php echo anchor(ADMIN_ROUTES.'/menu/edit/'.$row->id,'修改')?> 

    <?php echo anchor(ADMIN_ROUTES.'/menu/delete/'.$row->id,'删除')?>
    </td>
 </tr>
<?php endforeach; ?>

</table>
