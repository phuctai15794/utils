<?php
	/* Database */
	$str="Chuỗi Cũ";
	$rec="Chuỗi Mới";

	foreach($config['lang'] as $key => $value) 
	{
		# Thuc hien update duong dan trong noidung bang product
		$d->reset();
		$sql="update #_product noidung".$key." set noidung".$key."=replace(noidung".$key.",'$str','$rec')";
		$d->query($sql);

		# Thuc hien update duong dan trong noidung bang news
		$d->reset();
		$sql="update #_news noidung".$key." set noidung".$key."=replace(noidung".$key.",'$str','$rec')";
		$d->query($sql);

		# Thuc hien update duong dan trong noidung bang news_static
		$d->reset();
		$sql="update #_news_static noidung".$key." set noidung".$key."=replace(noidung".$key.",'$str','$rec')";
		$d->query($sql);
	}

	/* PDO */
	$str="Chuỗi Cũ";
	$rec="Chuỗi Mới";

    foreach($config['website']['lang'] as $key => $value) 
    {
        # Thuc hien update duong dan trong noidung bang product
        $d->rawQuery("update #_product noidung".$key." set noidung".$key."=replace(noidung".$key.",'$str','$rec')");

        # Thuc hien update duong dan trong noidung bang news
        $d->rawQuery("update #_news noidung".$key." set noidung".$key."=replace(noidung".$key.",'$str','$rec')");

        # Thuc hien update duong dan trong noidung bang news_static
        $d->rawQuery("update #_static noidung".$key." set noidung".$key."=replace(noidung".$key.",'$str','$rec')");
    }
?>