<br/>
<br/>
  <center>
    <div class="div1" >
    <div class="footer">
    
        <?php foreach($topMenu->result() as $k=>$item):
                    if($item->uri=='index') continue; 
        ?>
            <ul class="ul" style="float:left;margin-left:20px;">
            <li><B><?php echo anchor($urls,$item->title);?></b></li>
            <?php
            $smenu = page_menu_get_list($item->id);
            foreach($smenu->result() as $Nitem):
            ?>
            <li><?php echo anchor($Nitem->uri,$Nitem->title)?></li>
            <?php endforeach;?>
            
            </ul>
        <?php endforeach;?>
        <span style="float:right;">
         <font style="font-size:14px;">&copy;</font> Coptyright 2010 eatools.cn  Inc.  All Rights Reserved.<br/>
   京 ICP备10037503号<script language="javascript" type="text/javascript" src="http://js.users.51.la/3968772.js"></script>
   </span>
   
   </div>
    </div>

    </center>
</body>
</html>
