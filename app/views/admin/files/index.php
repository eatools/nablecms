<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th>编号</th>
    <th>标题</th>
    <th>扩展名</th>
    <th>创建时间</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>

<tr class="tr_bg">
    <td align="center"><?php echo $row->id ?></td>
    <td><a target="_blank" href="<?php echo base_url()?>media/upload/<?php echo $row->title?>"><?php echo $row->title ?></a></td>
    <td><?php echo $row->ext ?></td>
    <td><?php echo date("Y-m-d H:i:s",$row->create_time)?></td>
    <td align="center">
 <?php echo admin_list_button("files",'d',$row->id)?></td>
 </tr>
<?php endforeach; ?>
</table>
