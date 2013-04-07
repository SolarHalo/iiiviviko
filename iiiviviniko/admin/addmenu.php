<?php
include '../load.php';

if(!isset($_SESSION['user'])){
	header("Location: index.php");
	ob_end_flush();
}


$category = new Category($dbutil);
$pagedb = new Page($dbutil);
$menus = $category->getAllMenu();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" /> 
<title>添加导航菜单 -- iiiviviniko</title> 
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
    	  <legend>添加导航菜单</legend>
    		<form action="./addmenuaction.php" method="post" enctype="application/x-www-form-urlencoded" class="form-vertical">
    			<label>父菜单:</label>
    			<select name="cateparent">
    				<option value="">无</option>
    				<?php foreach ($menus as $menu) {
    						if(count($menu['link']) == 0){
    				?>
    					<option value="<?php echo $menu['id'];?>"><?php echo $menu['name']?></option>
    				<?php } }?>
    			</select><span class="help-inline">不选择父菜单会作为顶级菜单显示!</span>
    			<label>菜单类型:</label>
    			<select name="catetype">
    				<option value="" selected="selected" >无类型</option>
    				<option value="contentlist">内容列表</option>
    				<option value="imagelist">图片菜单</option>
    			</select><span class="help-inline">此处选择后无法修改,请谨慎选择!</span>
    		 	<label>名称:</label> <input type="text" name="name" class="span5" />
    			<label>描述:</label>  <textarea name="desc" class="span5"></textarea><br/><br/>
    			<input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>" />
    			<input type="hidden" name="resource" value="<?php if(array_key_exists('HTTP_REFERER', $_SERVER)) echo $_SERVER['HTTP_REFERER']?>" />
    			<input type="submit"  class="btn btn-info" value="提交"/>
    		</form>
    	 </fieldset>
    	</div>
     </div>
</div>

</body>
</html>