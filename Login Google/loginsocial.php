<?php
	include "ajax_config.php";
	$cmt = $_POST['cmt'] !='' ? $_POST['cmt']:'google' ;
	$id = $_POST['id'];
	$name = $_POST['name'];
	$img = $_POST['img'];
	$mail = $_POST['mail'];
	$return['status']=0;
	if(isset($cmt) && $cmt == 'google'){
	    $sql = "select * from #_member where oauth_provider='google' and googleID ='" . $id . "'  OR username ='" . $mail . "' limit 0,1";
	    $counts=$d->rawQuery($sql);
	    if (count($counts)> 0){
	        $rs_login= $d->rawQueryOne($sql);
	        $id_user = $rs_login['id'];
	        if(empty($rs_login['googleID'])){
	            $d->rawQuery("update #_member set googleID = ? where id = ?",array($user['id'],$id_user));
	        }
	        if(empty($_SESSION[$login_member])){
	            $lastlogin = time();
	            $login_session = md5($rs_login['password'].$lastlogin);
	            $d->rawQuery("update #_member set login_session = ?, lastlogin = ? where id = ?",array($login_session,$lastlogin,$id_user));
	            $_SESSION[$login_member]['active'] = true;
	            $_SESSION[$login_member]['id'] = $rs_login['id'];
	            $_SESSION[$login_member]['username'] = $rs_login['username'];
	            $_SESSION[$login_member]['dienthoai'] = $rs_login['dienthoai'];
	            $_SESSION[$login_member]['diachi'] = $rs_login['diachi'];
	            $_SESSION[$login_member]['email'] = $rs_login['email'];
	            $_SESSION[$login_member]['ten'] = $rs_login['ten'];
	            $_SESSION[$login_member]['login_session'] = $login_session;
	            setcookie('login_member_id',"",-1,'/');
	            setcookie('login_member_session',"",-1,'/');
	        }
	        $return['status']=1;
	    } else {
	        global $d;
	        $data_insert = array();
	        $data_insert['oauth_provider'] = "google";
	        $data_insert['googleID']      = $id;
	        $data_insert['ten']       = $name;
	        $data_insert['email']          = $mail;
	        $data_insert['username']          = $mail;
	        $data_insert['avatar']         = $img;
	        $data_insert['gioitinh']         = 0;
	        $data_insert['hienthi']        = 1;
	        $data_insert['ngaytao']        = time();
			$d->insert('member',$data_insert);
	        $id_insert = $d->getLastInsertId();
	        $sql = "select ten, username, gioitinh, ngaysinh, email, dienthoai, diachi,id,facebookID,googleID from #_member where id = ? limit 0,1";
	        $row_detail = $d->rawQuery($sql,array($id_insert));
	        if (count($row_detail) > 0) {
	            $rs_login               = $d->rawQueryOne($sql,array($row_detail[0]['id']));
	            $lastlogin = time();
	            $login_session = md5($row_detail['password'].$lastlogin);
	            $d->rawQuery("update #_member set login_session = ?, lastlogin = ? where id = ?",array($login_session,$lastlogin,$id_user));
	            $_SESSION[$login_member]['active'] = true;
	            $_SESSION[$login_member]['id'] = $rs_login['id'];
	            $_SESSION[$login_member]['username'] = $rs_login['username'];
	            $_SESSION[$login_member]['dienthoai'] = $rs_login['dienthoai'];
	            $_SESSION[$login_member]['diachi'] = $rs_login['diachi'];
	            $_SESSION[$login_member]['email'] = $rs_login['email'];
	            $_SESSION[$login_member]['ten'] = $rs_login['ten'];
	            $_SESSION[$login_member]['login_session'] = $login_session;
	            setcookie('login_member_id',"",-1,'/');
	            setcookie('login_member_session',"",-1,'/');
	            $return['status']=1;
	        }
	    }
	}
	echo json_encode($return);
?>