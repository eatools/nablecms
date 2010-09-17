<?php
$this->output->set_header("Content-Type:text/xml");
?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84">
<?php foreach($list as &$item):?>
<url>
    <loc><?php echo site_url($item->uri)?></loc>
    <lastmod><?php echo date("c",$item->edit_time)?></lastmod>
    <changefreq>always</changefreq>
    <priority>1.0</priority>
</url>
<?php endforeach;?>
</urlset> 