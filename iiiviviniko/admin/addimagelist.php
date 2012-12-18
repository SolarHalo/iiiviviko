<?php
if(!array_key_exists('pid', $_GET)){
	header("Location: ".$root_path."/404.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" /> 
<title>iiiviviniko</title> 
<link href="../style/style.css" type="text/css" rel="stylesheet" />
 <link href="../css/bootstrap.min.css" rel="stylesheet"></link>
<script type="text/javascript" src="../js/jquery-1.8.0.min.js" ></script>
</head>
<body>
<div class="container">
    <div class="headlogo"><a href="#"><img src="../images/logo.jpg" /></a></div>  
     <div class="rightbox">
     	<div class="add_content">
     	<fieldset>
    	  <legend>添加图片列表</legend>
    		<form action="./imagelistuploaded.php" method="post" enctype="multipart/form-data">
    			名称: <input type="text" name="name" size="50"/><br/><br/>
    			描述: <textarea name="desc" rows="4" cols="50"></textarea><br/><br/>
    			图片: <input type="file" name="img" /><br/><br/>
    			<input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>" />
    			<input type="hidden" name="resource" value="<?php if(array_key_exists('HTTP_REFERER', $_SERVER)) echo $_SERVER['HTTP_REFERER']?>" />
    			<input type="submit" class="btn btn-info"  value="提交"/>
    		</form>
    	</fieldset>
    	</div>
     </div>
</div>

</body>
</html>