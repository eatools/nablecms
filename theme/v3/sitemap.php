<?php
$this->output->set_header("Content-Type:text/xml");
$this->load->helper('page');
?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84">
<?php 
$list = page_menu_get_list(0);
foreach($list->result() as $item):?>
<url>
    <loc><?php echo site_url($item->uri)?></loc>
    <lastmod><?php echo date("c",$item->edit_time)?></lastmod>
    <changefreq>always</changefreq>
    <priority>1.0</priority>
</url>

<?php 
$list2 = page_menu_get_list($item->id);
foreach($list2->result() as $item2):?>
<url>
    <loc><?php echo site_url($item2->uri)?></loc>
    <lastmod><?php echo date("c",$item2->edit_time)?></lastmod>
    <changefreq>always</changefreq>
    <priority>1.0</priority>
</url>
<?php endforeach;?>

<?php endforeach;?>
</urlset> 