<?php 
    session_start();
	$session=session_id();
	@define ( '_source' , './sources/');
	@define ( '_lib' , './libraries/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	include_once _source."lang_$lang.php";
	include_once _lib."file_requick.php";
	if($_GET['lang']!='' && in_array($_GET['lang'], array('en','vi','cn')))
	{
		$_SESSION['lang_vuvanthuong_11_12_2018']=$_GET['lang'];
		header("location:".$url_web."");
	}
	else
	{
		$_SESSION['links']=getCurrentPageURL();
	}

	$d->reset();
	$sql="select * from #_pushonesignal";
	$d->query($sql);
	$onesignal=$d->result_array();
	
	header('content-type: text/html; charset=utf-8');
	// sendSync($onesignal[0]["id"]);	

	for($i=0;$i<count($onesignal);$i++)
	{ 
	 	$date = date('d',$onesignal[$i]['date']);
		$daynow =date('d',time()) ;
		$number = $onesignal[$i]['number'];
		$solancon = $onesignal[$i]['solancon'];
		$times = $onesignal[$i]['times'];

		if($onesignal[$i]['gio']==0){
			$time_star = $onesignal[$i]['phut']*60;
		}
		else if($onesignal[$i]['phut']==0)
		{
			$time_star = $onesignal[$i]['gio']*60;
		}
		else
		{
			$time_star = $onesignal[$i]['gio']*$onesignal[$i]['phut']*60;
		}
		$timegan = $onesignal[$i]['timegannhat'];
		$muoi = $times*60;
		$timenow = date('H',time()) *  date('i',time()) *60;
		
		$time_toida=$timegan+$muoi;

		if($date==$daynow)
		{
			if((($time_star+30)>=$time_star) && (($time_star-30)<=$time_star))
			{
				if($solancon>0 && $solancon<=$number)
				{
					// echo($timegan+$muoi."----".$timenow."----".time());
					// echo("-----".date("H:i",$timenow)."-----");
					echo("--Thời gian kết thúc đẩy--".date("d-m-y H:i",$timegan+$muoi));
					echo("--Thời gian bắt đầu đẩy--".date("d-m-y H:i",$timegan));
					
					if($timegan <=$time_toida)
					{
						$sqlUpdate = "update table_pushonesignal SET solancon=solancon-1 WHERE  id = ".$onesignal[$i]["id"]."";
						mysql_query($sqlUpdate) or die(mysql_error());
						print_r($sqlUpdate);
						sendSync($onesignal[$i]["id"]);		
					}

					// if($timenow == ($timegan+$muoi))
					// {
					// 	$sql1 = "update table_pushonesignal SET timegannhat=".$timenow." WHERE  id = ".$onesignal[$i]["id"]."";				
					// 	$data1= mysql_query($sql1);
						
					// 	$sqlUpdate = "update table_pushonesignal SET solancon=solancon-1 WHERE  id = ".$onesignal[$i]["id"]."";
					// 	mysql_query($sqlUpdate) or die(mysql_error());
						
					// 	sendSync($onesignal[$i]["id"]);			
					// }
				}
			}		
		}
		else
		{
			$data['solancon'] =$onesignal[$i]['number'];	
			$data['date'] = time();
			$d->setTable('pushonesignal');
			$d->setWhere('id', $onesignal[$i]["id"]);
			$d->update($data);		
		}
	}

	function sendMessage_onesignal($heading,$content,$url='https://sofaquocduong.com',$photo)
	{
		global $onesignal_app_id,$onesignal_rest_app_id;

		$contents = array(
			"en" => $content
		);
		$headings = array(
			"en" => $heading
		);
		
		$uphoto = "https://".$config_url.'/'._upload_sync_l.$photo;
		
		$fields = array(
			'app_id' => $onesignal_app_id, // Thay đổi OneSignal App ID
			'included_segments' => array('All'),
			'contents' => $contents,
			'headings' => $headings,
			'url' => $url
		);
		$fields = json_encode($fields);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic '.$onesignal_rest_app_id));// Thay đổi REST API Key
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}

	function sendSync($id)
	{
		global $d;
		if(isset($id))
		{
			$id = themdau($id);
			$d->reset();
			$sql = "select id,photo,thumb,name,description,link from #_pushonesignal where id='".$id."'";
			$d->query($sql);
			$row = $d->fetch_array();
			sendMessage_onesignal($row['name'],$row['description'],$row['link'],$row['photo']);
		}
	}
?>