<?php
	// Config OneSignal - Copy on config.php
	$onesignal_app_id = "af12ae0e-cfb7-41d0-91d8-8997fca889f8";
	$onesignal_rest_app_id = "MWFmZGVhMzYtY2U0Zi00MjA0LTg0ODEtZWFkZTZlNmM1MDg4";
?>

<head>
	<!-- OneSignal --> 
	<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
	<script type="text/javascript">
		var OneSignal = window.OneSignal || [];
		OneSignal.push(function() {
			OneSignal.init({
				appId: "<?=$onesignal_app_id?>"
			});
		});
	</script>
</head>