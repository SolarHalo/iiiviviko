<?php
include '../load.php';

$categorydb = new Category($dbutil);

$success = false;

if(!(array_key_exists('name', $_POST) && array_key_exists('pid', $_POST) )){
	$success = false;
}else{
	$name = $_POST['name'];
	$pid = $_POST['pid'];
	$desc = $_POST['desc'];
	$success = true;
	if($success){
		$time=time();
		$categ = array("pid"=> $pid, "name"=>$name,
			 'desc'=> $desc, "rank" =>$time, "link"=>"/contentlist.php");
		$categorydb->insertMenu($categ);
	}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Refresh" content="3; URL=<?php if(count($_POST['resource'])>0) echo $_POST['resource']; else echo "./home.php"; ?>"></meta>

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
	      <?php if($success) echo "添加活动成功!"; else echo "添加活动失败!";?>
	    </div>
	 
 </div>
</div>

</body>
</html>