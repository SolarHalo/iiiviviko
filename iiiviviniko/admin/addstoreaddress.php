<?php
include '../load.php';
 
$storedb = new Store($dbutil);


$success = true;
if(count($_POST) > 0){
	$aera = $_POST['area'];
	$name = $_POST['name'];
	$address = $_POST['address'];

	if(strlen($name) > 0 && strlen($address) > 0){
		$store = array("name"=> $name, "area"=>$aera, "address"=>$address);
		$storedb->insertStore($store);
		header("Location: ".$_POST['resource']);
	}else{
		$success = false;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" /> 
<title>iiiviviniko</title> 
<link href="../style/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../js/jquery-1.8.0.min.js" ></script>
 <link href="../css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">
$(document).ready(function(){
	 $("#btn_close").click(function(){
		  //$(".alert").css("display", "block");
		  $(".alert").css("display", "none");
	  })
});
</script>
</head>
<body>
<div class="container">
    <div class="headlogo"><a href="#"><img src="../images/logo.jpg" /></a></div>  
     <div class="rightbox">
     	<div class="add_content">
     	<fieldset>
    	  <legend>添加内容</legend>
     		<?php if(!$success){?>
    		<div  class="alert" style="color:red;">
    		<button type="button" id="btn_close" class="close" data-dismiss="alert" >&times;</button>
    		数据不全,请全部输入!
    		</div> 
    		<?php }?>
    		<form action="" method="post" enctype="application/x-www-form-urlencoded">
    			所属区: <select name="area">
    				<option>华东区</option>
    				<option>华中区</option>
    				<option>华南区</option>
    				<option>华北区</option>
    				<option>东北区</option>
    				<option>西南区</option>
    			</select><br/><br/>
    			名称: <input type="text" name="name" size="50"/><br/><br/>
    			地址: <input name="address" type="text" size="50"></input><br/><br/>
    			<input type="hidden" name="resource" value="<?php if(array_key_exists('HTTP_REFERER', $_SERVER)) echo $_SERVER['HTTP_REFERER']?>" />
    			<input type="submit" class="btn btn-info" value="提交"/>
    		</form>
    		</fieldset>
    	</div>
     </div>
</div>

</body>
</html>