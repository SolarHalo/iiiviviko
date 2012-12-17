<?php
include '../load.php';

$category = new Category($dbutil);
$pagedb = new Page($dbutil);
$menus = $category->getAllMenu();

$mainMenu =  $_GET['menu'];
$menuInfo = null;
if(array_key_exists('list', $_GET)){
	foreach ($menus as $menu){
		if($menu['name'] == $mainMenu){
			foreach ($menu['submenu'] as $submenu){
				if($submenu['name'] == $_GET['list']){
					$menuInfo = $submenu;
					break;
				}
			}
		}
	}
}else{
	foreach ($menus as $menu){
		if($menu['name'] == $mainMenu){
			$menuInfo = $menu;
			break;
		}
	}
}

$activities = $category->getSubMenus($menuInfo['id']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iiiviviniko</title> 
<link href="../style/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../js/jquery-1.8.0.min.js" ></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".deleteimage").click(function(){
			var ele = $(this);
			var id = $(this).attr("delid");
			$.ajax({
				'url': "./ajaxoperation.php",
				'data': {'method': 'delcate', 'id': id},
				'success': function (data){
					ele.parent("li").remove();
				}
				});
		});
});
</script>
</head>

<body>
<div class="container">
    <div class="headlogo"><a href="#"><img src="../images/logo.jpg" /></a></div>   
    <div class="left-menu">
		<?php include 'menulist.php';?>    	
    </div>
	<div class="rightbox">
        <div class="cr_content">
        	<ul class="text-list">
        		<?php foreach ($activities as $activity){?>
        		<li><a class="textlist" href="/admin/contentlist.php?menu=<?php echo $_GET['menu'];?>&ol=<?php echo $activity->id;?>"><?php echo $activity->desc;?></a><img src="../images/deleteimage.png" alt="" delid="<?php echo $activity->id; ?>" class="deleteimage" style="width: 16px; height: 16px;"/></li>
        		<?php }?>
        		<li><a href="./addactivity.php?pid=<?php echo $menuInfo['id'];?>" ><img src="../images/addactivity.png" ></img>添加一个活动</a></li>
            </ul>
        </div>
    </div>
</div>   
</body>
</html>