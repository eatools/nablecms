<?php 
include dirname(__FILE__).'/../header_.php';?>
<style>
.rmenu div { font-size:12px;line-height:24px;}
.rmenu div div{margin-left:20px;}
.rmenu b{color:#3366dd;}
</style>
<table border=0 cellpadding=0 cellspacing=1 class="table" width=100% >
<tr>
    <td valign="top">
    
    <?php echo $content_for_layout?>
    
    </td>
    <td width="200" class="rmenu"  valign="top" nowrap>
        
            <?php
                
                
                
                function nextList($page_list,$id,$controllerList){
                    foreach($page_list[$id] as & $item){
                        ?>
                        <div>
                        
                        <?php 
                        
                        if(isset($controllerList[$item->controller])){
                            
                            echo anchor(ADMIN_ROUTES."/$item->controller/index/$item->id",$item->title) .'&nbsp;'
                                .anchor(ADMIN_ROUTES."/$item->controller/add/$item->id",'<img  title="发布"  border=0 style="border:0px;" src="'.base_url().'media/images/icon/add.gif" > ') ;
                         
                        }else
                        {
                            echo $item->title;
                        }
                        ?>
                        <?php
                            if(isset($page_list[$item->id])) 
                                nextList(& $page_list,$item->id , & $controllerList);
                        ?>
                        </div>
                        
                        
            <?php   }
                }
            ?>
            
        <?php 
        if(count($page_list)>0) nextList($page_list,0 , & $siteThemeConf['controller'] );
        echo "没有添加分类页面!";
        ?>

    </td>
</tr>

</table>
