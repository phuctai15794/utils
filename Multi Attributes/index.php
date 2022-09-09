<?php
	/* Cập nhật dạng json */
	$attr = array();
	foreach($_POST['attr']['name'] as $k=>$v)
	{
		if($v && $_POST['attr']['value'][$k])
		{
			$attr[] = array("name"=>trim($v),"value"=>trim($_POST['attr']['value'][$k]));
		}
	}
	$data['attr'] = mysql_real_escape_string(json_encode($attr));

	/* Cập nhật dạng tách bảng (Cập nhật lại file ajax) */
	if(isset($_POST['unitprice']))
	{
		$unitprice = array();
		$unitprice['idproduct'] = $id;
		$unitprice['type'] = $_POST['type'];
		$unitprice['ngaytao'] = time();
		$unitprice['hienthi'] = 1;
		mysql_query("DELETE FROM table_product_dongia WHERE idproduct=$id");
		foreach($_POST['unitprice']['stt'] as $k => $v)
		{
			if($_POST['unitprice']['stt'][$k] && $_POST['unitprice']['soluongtu'][$k] && $_POST['unitprice']['soluongden'][$k] && $_POST['unitprice']['gia'][$k])
			{
				$unitprice['stt'] = $_POST['unitprice']['stt'][$k];
				$unitprice['soluongtu'] = $_POST['unitprice']['soluongtu'][$k];
				$unitprice['soluongden'] = $_POST['unitprice']['soluongden'][$k];
				$unitprice['gia'] = $_POST['unitprice']['gia'][$k];

				$d->reset();
				$d->setTable('product_dongia');
				$d->insert($unitprice);
			}
		}
	}
?>

<style type="text/css">
	.add-unit-price{background:#3D5E73;border:0;padding:7px 10px 5px 11px;border-radius:3px;color:#fff;font-size:12px;display:inline-block;margin-bottom:10px;text-transform:capitalize;cursor:pointer;}
	.add-unit-price:hover{background:#3876A7;}
	.item-unit-price{max-width:500px;margin-bottom:15px;display:-webkit-flex;display:-moz-flex;display:-ms-flex;display:-o-flex;display:flex;align-items:flex-start;justify-content:space-between;border:1px solid #ddd;padding:10px;border-radius:5px;background:#eee;}
	.item-unit-price:last-child{margin-bottom:0px;}
	.haft-unit-price{width:25%;}
	.haft-unit-price p{font-weight:bold;margin-bottom:3px;padding:0px;}
	.haft-unit-price input{box-sizing:border-box;width:100%!important;}
	.stt-unit-price{width:9%;text-align:center;}
	.remove-unit-price{width:6%;text-align:center;}
	.remove-unit-price a{cursor:pointer;display:block;font-size:17px;margin-top:9px;}
</style>

<a class="add-unit-price">Thêm đơn giá</a>
<div class="grid-unit-price">
	<?php foreach($unitprice as $k => $v) { ?>
		<div class="item-unit-price">
			<div class="haft-unit-price stt-unit-price">
				<p>STT</p>
				<input type="text" name="unitprice[stt][]" value="<?=$v['stt']?>" required/>
			</div>
			<div class="haft-unit-price">
				<p>Số lượng từ</p>
				<input type="text" name="unitprice[soluongtu][]" value="<?=$v['soluongtu']?>" required/>
			</div>
			<div class="haft-unit-price">
				<p>Số lượng đến</p>
				<input type="text" name="unitprice[soluongden][]" value="<?=$v['soluongden']?>" required/>
			</div>
			<div class="haft-unit-price">
				<p>Giá</p>
				<input type="text" name="unitprice[gia][]" value="<?=$v['gia']?>" required/>
			</div>
			<div class="haft-unit-price remove-unit-price">
				<p>Xóa</p>
				<a onclick="removeUnitPrice(this,<?=$v['id']?>);"><i class="fas fa-trash-alt"></i></a>
			</div>
		</div>
	<?php } ?>
</div>

<script type="text/javascript">
	jQuery(function($){
		$(".add-unit-price").click(function(){
			$html = $("#unit-price-temp").html();
			$(".grid-unit-price").append($html);
			return false;
		})
	})
	function removeUnitPrice(element,id)
	{
		$element = jQuery(element);
		if(confirm("Bạn muốn xóa đơn giá ?"))
		{
			if(id)
			{
				jQuery.ajax({
                    type: 'POST',
                    url: 'ajax/ajax_unitprice.php',
                    data: {id:id}
                });
			}
            $element.parents(".item-unit-price").remove();
		}
		return false;
	}
</script>

<script type="html/template" id="unit-price-temp">
	<div class="item-unit-price">
		<div class="haft-unit-price stt-unit-price">
			<p>STT</p>
			<input type="text" name="unitprice[stt][]" required/>
		</div>
		<div class="haft-unit-price">
			<p>Số lượng từ</p>
			<input type="text" name="unitprice[soluongtu][]" required/>
		</div>
		<div class="haft-unit-price">
			<p>Số lượng đến</p>
			<input type="text" name="unitprice[soluongden][]" required/>
		</div>
		<div class="haft-unit-price">
			<p>Giá</p>
			<input type="text" name="unitprice[gia][]" required/>
		</div>
		<div class="haft-unit-price remove-unit-price">
			<p>Xóa</p>
			<a onclick="removeUnitPrice(this);"><i class="fas fa-trash-alt"></i></a>
		</div>
	</div>
</script>