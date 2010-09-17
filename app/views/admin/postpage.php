
<center>
<table class="table" style="width:400px;">
   	<tr>
        <?php 
        if(isset($repayment['s'])) echo '<th align="left"><img style="float:left;" src="'.base_url().'media/images/icon/yes.png" >操作提示！</th></tr><tr><td>'.$repayment['s'];
        else echo '<th align="left"><img style="float:left;" src="'.base_url().'media/images/icon/no.png" >操作提示！</th></tr><tr><td>'.$repayment['e'];	
        ?>
     <?php if(isset($repayment['js'])):?>
     	<script type="text/javascript">
     		<?php echo $repayment['js']?>
     	</script>
     <?php endif;?>
     <a style="float:right;" onclick="history.back(-1)">返回</a>
     </td>
     </tr>
</table>


</center>