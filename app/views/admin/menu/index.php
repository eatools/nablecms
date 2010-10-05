
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th width="30">编号</th>
    
    <th>名称</th>
    <th  width="30">类型</th>
    <th  width="30">有效</th>
    <th width="60">操作</th>
 </tr>
<?php foreach($list as $row): 
?>

<tr class="tr_bg" >
    <td><?php echo $row->id ?></td>
    <td title="
        URI:<?php echo $row->url?><br/>
        排序:<?php echo $row->order?><br/>
        创建时间：<?php echo date('Y-m-d H:i:s',$row->create_time)?><br/>
        修改时间:<?php echo date('Y-m-d H:i:s',$row->edit_time)?>
        <br/>
        最后修改：<?php echo $row->account_id?>
        " >
    <?php echo $row->title ?>
    </td>
    <td><?php echo $row->is_param?></td>
    <td align="center"><?php echo admin_static(($row->is_del==1)?0:1)?></td>
    <td>
    <?php echo admin_list_button("menu",'aed',$row->id)?>
    </td>
 </tr>
<?php endforeach; ?>

</table>
