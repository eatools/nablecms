
<center>
<table class="table">
    <tr>
        <th align="left">数据删除确认！</th>
    </tr>
    <tr>
     <td>
        <?php if(isset($message)):?>
        <p><B><?php echo $message?></b></p>
        <?php endif;?>
        <p>数据删除将无法恢复！是否继续操作？</p>
        
         
         <span id="mess">
         <a onclick="AjaxRequest('<?php echo current_url()?>','POST',{},function(request,flag,json){if(flag=='s') history.back(-1)},'mess');">是</a> <a onclick="history.back(-1)">否</a>
         </span>
        </td>
    
    </tr>
</table>


</center>