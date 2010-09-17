<form method="POST" action="" onsubmit="try{
FormRequest(this,'','mess');
return false;
}catch(e){return false}">
<table border=0 cellpadding=0 cellspacing=1 class="table" width="100%" align="right" >
 <tr>
    <th colspan="2" align="left">链接添加</th>

 </tr>


<tr class="tr_bg">
    <td>名称</td>
    <td ><input type="text" name="title" value=""></td>
</tr>


<tr class="tr_bg">
    <td></td>
    <td><input type="submit" value="保存"><span id="mess"></span></td>
</tr>

</table>
</form>
