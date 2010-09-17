<?php include dirname(__FILE__).'/header_.php'?>
<?php if (isset($content_for_layout)):?>
<script type="text/javascript">
    var _tr_bg_last;
    Event.observe(window,'load',function()
    {
        var list = document.getElementsByClassName('tr_bg');

        for(var i=0;i<list.length;i++)
        {
            $(list[i]).on('mouseover',function()
            {
                   if(typeof(_tr_bg_last)!='undefined') _tr_bg_last.removeClassName("MouseOverCss");
                   $(this).addClassName("MouseOverCss");
                   _tr_bg_last=$(this);
            });
        }
    });
</script>
<body><?php echo $content_for_layout?></body>
</html>
<?php endif; ?>