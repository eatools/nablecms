<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th>编号</th>
    <th>布局名称</th>
    <th>主功能</th>
    <th>模板</th>
    <th>状态</th>
    <th>最后修改时间</th>
    <th>最后修改人</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>

<tr class="tr_bg">
    <td align="center"><?php echo $row->layout_id ?></td>
    <td><?php echo $row->title ?></td>
    <td><?php echo $row->admin_module?></td>
    <td ><?php echo $row->tpl?></td>
    <td align="center">
    <?php if ($row->is_del==0):?>
        可用
    <?php else:?>
    禁用
    <?php endif;?>
    </td>
    <td align="right"><?php echo date('Y-m-d H:i:s',$row->edit_time)?></td>
    <td align="center"><?php echo $row->account_id?></td>
    <td align="center">
    <?php echo anchor(ADMIN_ROUTES.'/sitelayout/edit/'.$row->layout_id,'修改')?>
 <?php echo anchor(ADMIN_ROUTES.'/sitelayout/delete/'.$row->layout_id,'删除')?></td>
 </tr>
<?php endforeach; ?>
</table>