<?php
include '../load.php';
include '../PageDB.php';

$pagedb = new Page($dbutil);

$success = false;

if(!(array_key_exists('name', $_POST) && array_key_exists('pid', $_POST) 
	&& array_key_exists('imagesmall', $_FILES) && array_key_exists('imagebig', $_FILES))){
	$success = false;
}else{
	$name = $_POST['name'];
	$pid = $_POST['pid'];
	$filename_s = explode(".", $_FILES['imagesmall']['name']);
	$filename_b = explode(".", $_FILES['imagebig']['name']);
	$time = date('Y-m-d-H-i-s');
	$filename_s[0] = $name."-".$time."-small";
	$filename_b[0] = $name."-".$time."-big";
	$image_s = IMAGEPATH.implode(".", $filename_s);
	$image_b = IMAGEPATH.implode(".", $filename_b);
	
	if(!move_uploaded_file($_FILES['imagesmall']['tmp_name'], $image_s)){
		$success = false;
	}else{
		$success = true;
	}
	if(move_uploaded_file($_FILES['imagebig']['tmp_name'], $image_b)){
		$success = true;
	}else{
		$success = false;
	}
	if($success){
		$time=date('Y-m-d H:i:s');
		$pagesmall = array("pid"=> $pid, "name"=>$name, "imgsmall"=> "/imageupload/".implode(".", $filename_s),
			 "imgbig"=>"/imageupload/".implode(".", $filename_b), "createtime" =>$time );
		$pagedb->insertPageContent($pagesmall);
	}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Refresh" content="3; URL=<?php if(count($_POST['resource'])>0) echo $_POST['resource']; else echo "/admin/home.php"; ?>"></meta>

<title>上次图片</title> 
<link href="../style/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="container">
   <?php if($success) echo "上传成功!"; else echo "上传失败!";?>
</div>

</body>
</html>