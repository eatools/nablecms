<center>

<div class="news">

<dl>
<?php foreach($News_Model_get_content_list as $item):?>
    <dt><?php echo $item->title?></dt>
    <dd>
    <?php echo $item->content?>
    </dd>

    <?php endforeach;?>
</dl>

</div>
</center>