 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iiiviviniko</title> 
<link href="style/style.css" type="text/css" rel="stylesheet" />
</head>

<body>

 <?php 
 
  echo  "__DIR__ is:".__DIR__."<br>";
  echo  "__FILE__ is:".__FILE__."<br>";
  echo  "dirname(__FILE__)".dirname(__FILE__)."<br>";
  echo  "_SERVER['REQUEST_URI'] :".dirname($_SERVER['REQUEST_URI'])."<br>";//获取当前域名的后缀
  echo  "dir _SERVER['REQUEST_URI'] :".$_SERVER['REQUEST_URI']."<br>";//获取当前域名的后缀
  echo  "_SERVER['HTTP_HOST'] :".$_SERVER['HTTP_HOST']."<br>";//获取当前域名的后缀
  echo  "_SERVER['DOCUMENT_ROOT'] :".$_SERVER['DOCUMENT_ROOT']."<br>";//获取当前域名的后缀
  echo  "_SERVER[HTTP_REFERER :".$_SERVER['HTTP_REFERER']."<br>";//
 ?>
</body>
</html>
