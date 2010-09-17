<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th>编号</th>
    <th>登录名称</th>
    <th>昵称</th>
    <th>注册时间</th>
    <th>注册IP</th>
    <th>最后登录时间</th>
    <th>最后登录IP</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>

<tr class="tr_bg">
    <td><?php echo $row->account_id ?></td>
    <td><?php echo $row->username ?></td>
    <td><?php echo $row->nickname ?></td>
    <td><?php echo date('Y-m-d H:i:s',$row->regist_time)?></td>
    <td><?php echo long2ip($row->regist_ip)?></td>
    <td><?php echo date('Y-m-d H:i:s',$row->login_time)?></td>
    <td><?php echo long2ip($row->login_ip)?></td>
    <td><?php echo anchor(ADMIN_ROUTES.'/account/edit/'.$row->account_id,'修改')?>
 <?php echo anchor(ADMIN_ROUTES.'/account/delete/'.$row->account_id,'删除')?></td>
 </tr>
<?php endforeach; ?>
</table>