<?php
include '../load.php';
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
	$rand = rand();
	$filename_s[0] = $rand."-".$time."-small";
	$filename_b[0] = $rand."-".$time."-big";
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
<meta http-equiv="X-UA-Compatible" content="IE=8" /> 
<meta http-equiv="Refresh" content="3; URL=<?php if(count($_POST['resource'])>0) echo $_POST['resource']; else echo $root_path."/admin/home.php"; ?>"></meta>

<title>上次图片</title> 
<link href="../style/style.css" type="text/css" rel="stylesheet" />
 <link href="../css/bootstrap.min.css" rel="stylesheet"></link>

</head>
<body>
<div class="container">
  
  <div class="hero-unit"> 
    <p>网页会在3秒内自动跳转</p>
    <a href="<?php if(count($_POST['resource'])>0) echo $_POST['resource']; else echo "/admin/home.php"; ?>">点击这里直接跳转</a>
	  
	    <div class="alert <?php if ($success) echo "alert-success"; else echo "alert-error";?>">
	      <?php if($success) echo "上传成功!"; else echo "上传失败!";?>
	    </div>
	 
 </div>
</div>

</body>
</html>