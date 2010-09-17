<?php if(isset($repayment)):?>
<script type="text/javascript">
	<?php if(isset($repayment['s'])){?>
    
	parent.<?php echo $_GET['script']?>("<?php echo $repayment['file']?>",'<?php echo $repayment['weburl']?>');
	history.back(-1);
	<?php }else{ ?>
		alert('<?php echo $repayment['e']?>');
	<?php } ?>
</script>
<?php endif; ?>
<form method="POST" action=""  enctype="multipart/form-data"  onsubmit="">
<input type="file" name="userfile" value=""><input type="submit" value="上传">
</form>
