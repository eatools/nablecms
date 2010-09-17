<style>
    dl{line-height:25px;border:1px solid #336699;background:#deeaf8;margin:4px 4px 15px; }
    dl  dd{ border-top:1px solid #336699;}
    dl  dt{}
</style>
<form method="POST" action="" onsubmit="try{
FormRequest(this);
return false;
}catch(e){return false}">

<input type="hidden" name="id" value="<?php echo $info->role_id?>" > 
<input type="submit" value="保存">

 <?php foreach($menu[0] as &$item):?>
    <dl>
        <dt><input type="checkbox" name="menuid[]" value="<?php echo $item['id']?>" <?php echo in_array($item['id'],$jur)?"checked":""?>><?php echo $item['title']?>&nbsp;&nbsp;&nbsp;&nbsp;</dt>
   
    <?php if(!isset($menu[$item['id']]) || !is_array($menu[$item['id']])) continue;?>
    <?php foreach($menu[$item['id']] as &$fastMenu):?>
    <dd><input <?php echo in_array($fastMenu['id'],$jur)?"checked":""?> type="checkbox" name="menuid[]" value="<?php echo $fastMenu['id']?>"><?php echo $fastMenu['title']?></dd> 

    <?php if(!isset($menu[$fastMenu['id']]) || !is_array($menu[$fastMenu['id']])) continue;?>
    <dd style="padding-left:40px;">
    <?php foreach($menu[$fastMenu['id']] as &$lastMenu):?>
     <span><input <?php echo in_array($lastMenu['id'],$jur)?"checked":""?> type="checkbox" name="menuid[]" value="<?php echo $lastMenu['id']?>"><?php echo $lastMenu['title']?></span>
    <?php endforeach;?>
    </dd>

           
    <?php endforeach;?>
    </dl>
 <?php endforeach;?>

</form>