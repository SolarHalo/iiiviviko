<?php
include './load.php';

$category = new Category($dbutil);
$storedb = new Store($dbutil);
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

//如果是三级列表,则获取三级列表信息
if(array_key_exists('ol', $_GET)){
	$menuInfo = $category->getMenuInfoById($_GET['ol']);
}

$stores = $storedb->getAllStores();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-9" />
<meta http-equiv="X-UA-Compatible" content="IE=8" /> 
<title>III VIVINIKO 时装官网</title> 
<link href="style/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.8.0.min.js" ></script>

<script type="text/javascript" src="js/listmenu.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	$(".stores-map > li").click(function(){
			var c = $(this).attr("class");
			$(".stores-list").css("display", "none");
			var d = ".storel_"+c.split("_")[1];
			$(d).css("display", "block");

			$(this).parent("ul").children("li").children("a").removeClass("stores-list-active");
			$(this).children("a").addClass("stores-list-active")
		})
});
</script>
</head>

<body>
<div class="container">
    <div class="headlogo"><a href="http://iiiviviniko.com"><img src="images/logo.jpg" /></a></div>   
    <div class="left-menu">
    	<?php include 'menulist.php';?>
    </div>
	<div class="rightbox">
    	<div class="cl_content mt20">
        	<ul class="stores-map">
        	<?php $sn = 0; foreach ($stores as $key => $store){?>
        		<li <?php echo "class='sarea_".$sn."'"; $sn++;?>><a href="#" <?php if($sn==1) echo "class='stores-list-active'";?>><?php echo $key;?></a></li>
        	<?php }?>
            </ul>
            <?php $sn=0; foreach ($stores as $key =>$store){?>
            <ul class="stores-list <?php echo "storel_".$sn; $sn++;?>" <?php if($sn>1) echo "style='display:none;'";?>>
            	<?php foreach ($store as $sto){?>
            	<li>
                	<h6><?php echo $sto->name; ?></h6>
                    <p><?php echo $sto->address; ?></p>
                </li>
            	<?php }?>
            </ul>
            <?php }?>
        </div> 
    </div>
</div>   
</body>
</html>
