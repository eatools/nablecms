<!-- form 提交操作处理 -->
<form method="POST" action="" onsubmit="try{
FormRequest(this,function(request,flag,conf){
    if(flag=='s')
    {
        if(confirm('添加成功！\n点击 [确认] 进入该文章编辑页面！\n或者 [取消] 继续添加! ')){
            location.href='<?php echo site_url(ADMIN_ROUTES."/blogs/edit/")?>/'+conf['insert_id'];
        }
    }
},'mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
 <tr >
    <th colspan="4">添加信息</th>
 </tr>
<tr class="tr_bg" >
    <td>名称</td>
    <td>
    <input type="text" name="title" value="">
    </td>
</tr>
<tr class="tr_bg">
    <td>作者</td>
    <td><input type="text" name="author" value=""></td>
</tr>
<tr class="tr_bg">
    <td>内容</td>
    <td colspan="3"><textarea name="log" ></textarea>
    </td>
</tr>
<tr class="tr_bg">
    <td></td>
    <td  colspan="3"><input type="submit" value="保存"><span style="display:none;" id="mess"></span></td>
</tr>
</table>
</form>
