
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th width="30">编号</th>
    <th  >标题</th>
    <th  width="30">状态</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>

<tr class="tr_bg" >
    <td><?php echo $row->id ?></td>
    <td title="最后修改时间:<?php echo date('Y-m-d H:i:s',$row->create_time)?><br/>作者:<?php echo $row->author?>"><?php echo $row->title ?></td>
    <td><?php echo admin_static(($row->is_del==1)?0:1)?></td>

    <td>
    <?php echo admin_list_button("news",'ed',$row->id)?>
    </td>
 </tr>
<?php endforeach; ?>

</table>
<?php  $this->load->view("admin/page");?>
