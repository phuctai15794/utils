<?php
	include ("ajax_config.php");

	$id = magic_quote($_POST["id"]);
	if($id)
	{
		$sql="delete from #_product_dongia where id=$id";
		$d->query($sql);
	}
?>