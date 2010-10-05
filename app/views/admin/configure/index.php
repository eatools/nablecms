<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th>编号</th>
    <th>标题</th>
    <th>编码</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>

<tr class="tr_bg">
    <td align="center"><?php echo $row->id ?></td>
    <td><?php echo $row->title ?></td>
    <td><?php echo $row->code ?></td>
    <td align="center">
 <?php echo admin_list_button("configure",'ed',$row->id)?></td>
 </tr>
<?php endforeach; ?>
</table>
