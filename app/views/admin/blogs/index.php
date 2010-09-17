<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th width="30">编号</th>
    <th  >标题</th>
    <th>作者</th>
    <th>发布时间</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>
<tr class="tr_bg" >
    <td><?php echo $row->id ?></td>
    <td><?php echo $row->title ?></td>
    <td><?php echo $row->author?></td>
    <td><?php echo date('Y-m-d H:i:s',$row->create_time)?></td>
    <td>
    <?php echo anchor(ADMIN_ROUTES.'/blogs/edit/'.$row->id,'修改')?> 
    <?php echo anchor(ADMIN_ROUTES.'/blogs/delete'.$row->id,'删除')?>
    </td>
 </tr>
<?php endforeach; ?>
</table>
<?php  $this->load->view("admin/page");?>