<?php
include '../load.php';

$categorydb = new Category($dbutil);

$success = false;

if(!(array_key_exists('name', $_POST)  )){
	$success = false;
}else{
 
	$name = $_POST['name'];
	$desc = $_POST['desc'];
	$parent = $_POST['cateparent'];
	$type = $_POST['catetype'];
	
	
	$success = true;
	if($success){
		$data = array('name'=> $name, 'desc'=>$desc , 'rank'=>time(),'menu' => 1);
		if($parent){
			$data['pid'] = $parent;
		}
		
		if($type){
			$data['link'] = '/'.$type.'.php';
		}
		$categorydb->insertMenu($data);
	}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Refresh" content="3; URL=<?php echo $root_path."/admin/menuoperation.php"; ?>"></meta>

<title>上次图片</title> 
<link href="../style/style.css" type="text/css" rel="stylesheet" />
<link href="../css/bootstrap.min.css" rel="stylesheet"></link>

</head>
<body>
<div class="container">
  
  <div class="hero-unit"> 
    <p>网页会在3秒内自动跳转</p>
    <a href="<?php echo $root_path."/admin/menuoperation.php";  ?>">点击这里直接跳转</a>
	  
	    <div class="alert <?php if ($success) echo "alert-success"; else echo "alert-error";?>">
	      <?php if($success) echo "添加菜单成功!"; else echo "添加菜单失败!";?>
	    </div>
	 
 </div>
</div>

</body>
</html>