<?php
	$data = null;
	$product = $d->rawQuery("SELECT ten$lang, tenkhongdauvi, tenkhongdauen, photo, gia, giamoi FROM table_product WHERE hienthi=1 AND type = ?",array('san-pham'));

	foreach($product as $k => $v)
	{
		$data[$k]['ten'] = trim($v['ten'.$lang]);
		$data[$k]['photo'] = $v['photo'];
		$data[$k]['tenkhongdau'] = $v[$sluglang];
		$data[$k]['giaban'] = "";
		
		if($v['giamoi'])
		{
			$data[$k]['giaban'].="<p class='price-old-search-product'>".number_format($v['gia'],0, ',', '.')." VNĐ</p>";
			$data[$k]['giaban'].="<p class='price-new-search-product'>Giá bán: <span>".number_format($v['giamoi'],0, ',', '.')." VNĐ</span></p>";
		}
		else
		{
			if($v['gia']) $data[$k]['giaban'].="<p class='price-new-search-product'>Giá bán: <span>".number_format($v['gia'],0, ',', '.')." VNĐ</span></p>";
			else $data[$k]['giaban'].="<p class='price-new-search-product'>Giá bán: <span>".lienhe."</span></p>";
		}
	}
	
	echo json_encode($data);
?>