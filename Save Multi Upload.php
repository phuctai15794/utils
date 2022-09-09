<?php
	if(isset($_FILES['files'])) 
	{
		$arr_chuoi = '';
		$arr_file_del = array();

		if(isset($_POST['jfiler-items-exclude-files-0']))
		{
			$arr_chuoi = str_replace('"','',$_POST['jfiler-items-exclude-files-0']);
			$arr_chuoi = str_replace('[','',$arr_chuoi);
			$arr_chuoi = str_replace(']','',$arr_chuoi);
			$arr_chuoi = str_replace('\\','',$arr_chuoi);
			$arr_chuoi = str_replace('0://','',$arr_chuoi);
			$arr_file_del = explode(',',$arr_chuoi);
		}

		$dem = 0;
        $myFile = $_FILES['files'];
        $fileCount = count($myFile["name"]);

        for($i=0;$i<$fileCount;$i++) 
        {
        	if($_FILES['files']['name'][$i]!='')
			{
				if(!in_array(($_FILES['files']['name'][$i]),$arr_file_del,true))
				{
					$file_name = $func->uploadName($myFile["name"][$i]);
					$file_ext = pathinfo($myFile["name"][$i], PATHINFO_EXTENSION);
					if(move_uploaded_file($myFile["tmp_name"][$i], UPLOAD_NEWS."/".$file_name.".".$file_ext))
		            {
						$data1['photo'] = $file_name.".".$file_ext;
						$data1['stt'] = (isset($_POST['stt-filer'][$dem])) ? $_POST['stt-filer'][$dem] : 0;
						$data1['tenvi'] = (isset($_POST['ten-filer'][$dem])) ? $_POST['ten-filer'][$dem] : '';
						$data1['id_photo'] = $id;
						$data1['com'] = $com;
						$data1['type'] = $type;
						$data1['kind'] = 'man';
						$data1['val'] = $type;
						$data1['hienthi'] = 1;
						$d->insert('gallery',$data1);
		            }
		            $dem++;
				}
            }
        }
    }
?>