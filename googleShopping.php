<?php
header("Content-Type: text/xml; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$export = '<?xml version="1.0" encoding="UTF-8"?>';
$export .= '<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">';
$export .= '<channel>';
$export .= '<title>' . $setting['tenvi'] . '</title>';
$export .= '<link>' . $setting['website'] . '</link> ';
$export .= '<description>' . $setting['tenvi'] . '</description>';

$products = $d->rawQuery("select * from #_product where type = 'san-pham' order by id desc");

if (!empty($products)) {
    foreach ($products as $k => $v) {
        $list = $d->rawQueryOne("select tenvi from #_product_list where id = ? limit 0,1", array($v['id_list']));
        $cat = $d->rawQueryOne("select tenvi from #_product_cat where id = ? limit 0,1", array($v['id_cat']));
        $category = '';
        $category .= $list['tenvi'] ?: '';
        $category .= !empty($cat['tenvi']) ? ' > ' . $cat['tenvi'] : '';
        $brand = $d->rawQueryOne("select tenvi from #_product_brand where id = ? limit 0,1", array($v['id_brand']));
        $price = number_format($v['gia'], 0, '', '.');

        $export .= "<item>";
        $export .= "<g:id>" . $v['id'] . "</g:id>";
        $export .= "<g:title>" . $v["tenvi"] . "</g:title>";
        $export .= "<g:description>" . strip_tags($v['mota_gshopping']) . "</g:description>";
        $export .= "<g:link>" . $config_base . $v['tenkhongdauvi'] . "</g:link>";
        $export .= "<g:image_link>" . $config_base . 'upload/product/' . $v['photo'] . "</g:image_link>";
        $export .= "<g:condition>new</g:condition>";
        $export .= "<g:price>" . $price . " VND</g:price> ";
        $export .= "<g:availability>in stock</g:availability>";
        $export .= "<g:brand>" . $brand['tenvi'] . "</g:brand>";
        $export .= "<g:google_product_category>" . $category . "</g:google_product_category>";
        $export .= "</item>";
    }
}

$export .= '</channel>';
$export .= '</rss>';

file_put_contents("../export.xml", $export);

header("Location: " . $config_base . "export.xml");
