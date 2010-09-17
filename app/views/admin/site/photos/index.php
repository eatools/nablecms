<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th>编号</th>
    <th>标题</th>
    <th>时间</th>
    <th>文件</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>

<tr class="tr_bg">
    <td align="center"><?php echo $row->id ?></td>
    <td><?php echo $row->title ?></td>
    <td><?php echo date('Y-m-d H:i:s',$row->create_time )?></td>
    <td><?php echo $row->files ?></td>
    <td align="center">
 <?php echo anchor(ADMIN_ROUTES.'/photos/edit/'.$this->uri->segment(3).'/'.$row->id,'修改')?>
 <?php echo anchor(ADMIN_ROUTES.'/photos/delete/'.$this->uri->segment(3).'/'.$row->id,'删除')?></td>
 </tr>
<?php endforeach; ?>
</table>