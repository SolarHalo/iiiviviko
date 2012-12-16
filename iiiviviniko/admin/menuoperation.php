<?php
include '../load.php';

$category = new Category($dbutil);
$pagedb = new Page($dbutil);
$menus = $category->getAllMenu();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iiiviviniko</title> 
<link href="../style/style.css" type="text/css" rel="stylesheet" />
   <link href="../css/bootstrap.min.css" rel="stylesheet"></link>

<script type="text/javascript" src="../js/jquery-1.8.0.min.js" ></script>
<script type="text/javascript" src="../js/jquery.dragsort-0.4.min.js" ></script>
<script type="text/javascript">
$(document).ready(function(){
	$("ul").dragsort({ dragSelector: "li", dragEnd: function() { }, dragBetween: false, placeHolderTemplate: "<li></li>" });
});

</script>
</head>
<body>
<div class="container">
    <div class="headlogo"><a href="#"><img src="../images/logo.jpg" /></a></div>  
     <div class="rightbox">
     <h2>管理菜单</h2>
     <br />
     <a href="#" class="btn">开始排序</a>
     <a href="#" class="btn">添加菜单</a>
     <br /><br />
     	<ul class="dragsort_main">
     	<?php 
    		foreach ($menus as $menu){
    	?>
	    	<li class="current" >
	            <h4><?php echo $menu['name'];?></h4>
	            <?php if(array_key_exists('submenu', $menu)){
	            ?>
	            <ul>
	            <?php foreach ($menu['submenu'] as $submenu){
	            ?>
	                <li><?php echo $submenu['name'];?></li>
	             <?php }?>
	            </ul>
	            <?php }?>
	        </li>
    	<?php 		
    		}
    	?>
    	</ul>
     </div>
</div>

</body>
</html>