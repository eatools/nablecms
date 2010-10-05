<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr>
    <th>编号</th>
    <th>登录名称</th>
    <th>昵称</th>
    <th>操作</th>
 </tr>
<?php foreach($list->result() as $row): 
?>

<tr class="tr_bg">
    <td><?php echo $row->account_id ?></td>
    <td title="
    注册时间：<?php echo date('Y-m-d H:i:s',$row->regist_time)?><br/>
    注册ip:<?php echo long2ip($row->regist_ip)?><br/>
    登录时间:<?php echo date('Y-m-d H:i:s',$row->login_time)?><br/>
    登录ip:<?php echo long2ip($row->login_ip)?>
    "><?php echo $row->username ?></td>
    <td><?php echo $row->nickname ?></td>
    <td><?php echo admin_list_button('account','ed',$row->account_id) ?></td>
 </tr>
<?php endforeach; ?>
</table>
