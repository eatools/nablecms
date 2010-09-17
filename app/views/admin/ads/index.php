<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th>编号</th>
    <th>所属页面</th>
    <th>标题</th>
    <th>备注</th>
    <th>文件</th>
    <th>链接</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>

<tr class="tr_bg">
    <td align="center"><?php echo $row->id ?></td>
    <td align="center"><?php echo isset($pageList[$row->page_id])?$pageList[$row->page_id]:"无"?></td>
    <td><?php echo $row->title ?></td>
    <td><?php echo $row->commint ?></td>
    <td><?php echo $row->files ?></td>
    <td><?php echo $row->links ?></td>
    <td align="center">
 <?php echo anchor(ADMIN_ROUTES.'/ads/edit/'.$row->id,'修改')?>
 <?php echo anchor(ADMIN_ROUTES.'/ads/delete/'.$row->id,'删除')?></td>
 </tr>
<?php endforeach; ?>
</table>