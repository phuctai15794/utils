<link rel="stylesheet" type="text/css" href="js/jquery.datetimepicker.css"/ >
<style type="text/css">
	.reviewOnesignal{width:450px;border:1px solid #ccc;border-radius:5px;box-shadow:1px 1px 1px #ccc;padding:5px;position:relative;box-sizing:border-box;margin:auto;display:flex;align-items:center;}
	.reviewOnesignal .img{float:left;}
	.reviewOnesignal .detail{float:left;margin-left:10px;width:278px;}
	.reviewOnesignal .detail h2{font-size:16px;color:#333333;margin:0;font-weight:bold;font-family:Tahoma,Arial;}
	.reviewOnesignal .detail h3{margin-top:10px;font-size:13px;display:block;padding:6px 0px 6px 6px;font-weight:bold;color:#003399;font-size:14px;font-family:Arial,Verdana;font-style:italic;border-bottom:1px solid #CCCCCC;clear:right;margin-bottom:8px;}
	.reviewOnesignal .detail h4{left:165px;color:#999;font-weight:normal;font-size:13px;}
	.clear{clear:both;}
</style>

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=pushOnesignal&act=add"><span>Thêm </span></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="index.php?com=pushOnesignal&act=save" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<ul class="tabs">
			<li>
				<a href="#info">Thông tin chung</a>
			</li>
		</ul>
		<div id="info" class="tab_content">
			<div class="formRow">
				<label>Tải hình ảnh:</label>
				<div class="formRight">
					<input type="file" id="file" name="file" />
					<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
					<div class="note"> Height:240px | Width:360px  <?=_format_duoihinh_l?> </div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Hình Hiện Tại :</label>
				<div class="formRight">
					<div class="mt10"><img src="<?=_upload_sync.$item['photo']?>"  width="100px" alt="NO PHOTO" width="100" /></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Tiêu đề</label>
				<div class="formRight">
					<input type="text" name="name" title="Nhập tên danh mục" id="name" class="tipS " value="<?=@$item['name']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Mô tả</label>
				<div class="formRight">
					<textarea rows="4" cols="" title="Nhập mô tả . " class="tipS" name="description" id="description" ><?=@$item['description']?></textarea>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Link</label>
				<div class="formRight">
					<input type="text" name="link" title="Nhập link" id="link" class="tipS" value="<?=@$item['link']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Số lần ghi</label>
				<div class="formRight">
					<input type="text" name="number" id="number" class="tipS" value="<?=@$item['number']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Số lần còn</label>
				<div class="formRight">
					<b><?=@$item['solancon']?></b>/ Khi hết số lần còn  bằng 0 vui lòng cập nhật lại "Số lần ghi"
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Thời gian bắt đầu đẩy</label>
				<div class="formRight">
					<input type="text" name="time_star" id="time_star" class="tipS datetimepicker2" value="<?=$item['gio'].':'.$item['phut']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Thời gian</label>
				<div class="formRight">
					<input type="text" name="times" id="times" class="tipS" value="<?=$item['times']?>" />
					<p><strong>Thời gian thực hiện thông báo đẩy tính bằng phút. vd: 1h thực hiện thông báo 1 lần. Nhập 60</strong> </p>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Xem trước</label>
				<div class="formRight">
					<div class="reviewOnesignal">
						<div class="img">
							<img class="imgview" style="max-width: 150px;" src="<?=_upload_sync.$item['photo']?>" alt="images">
						</div>
						<div class="detail">
							<h2 id="caption"><?=  empty($item['name'])?'OneSignal Web  Push Notification':$item['name'] ?></h2>
							<h3 id="desc"><?=  empty($item['description'])?'This is an example of web push notifications.':$item['description'] ?></h3>
							<h4 id="linkto"><?=  empty($item['link'])?'https://youlink.com':$item['link'] ?></h4>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<div class="formRight">

					<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
					<a href="index.php?com=pushOnesignal&act=man" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
</form>   

<script src="js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" charset="utf-8">
	function TreeFilterChanged2()
	{
		$('#validate').submit();		
	}
	function imgreview(input)
	{
		if (input.files && input.files[0])
		{
			var filerd = new FileReader();
			filerd.onload = function(e){
				$('.imgview').attr('src',e.target.result);
			};
			filerd.readAsDataURL(input.files[0]);
		}
	}
	$(document).ready(function() {
		jQuery('.datetimepicker2').datetimepicker({
			datepicker:false,
			format:'H:i'
		});	
		jQuery.datetimepicker.setLocale('de');
		jQuery('#datetimepicker1').datetimepicker({
			i18n:{
				de:{
					months:[
					'Januar','Februar','März','April',
					'Mai','Juni','Juli','August',
					'September','Oktober','November','Dezember',
					],
					dayOfWeek:[
					"So.", "Mo", "Di", "Mi", 
					"Do", "Fr", "Sa.",
					]
				}
			},
			timepicker:false,
			format:'d.m.Y'
		});
		$('#name').keyup(function(event) {
			document.getElementById("caption").innerHTML = this.value;
		});
		$('#name').change(function(event) {
			document.getElementById("caption").innerHTML = this.value;
		});
		$('#description').keyup(function(event) {
			document.getElementById("desc").innerHTML = this.value;
		});
		$('#description').change(function(event) {
			document.getElementById("desc").innerHTML = this.value;
		});
		$('#link').keyup(function(event) {
			document.getElementById("linkto").innerHTML = this.value;
		});
		$('#link').change(function(event) {
			document.getElementById("linkto").innerHTML = this.value;
		});
	});
</script>