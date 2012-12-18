<?php
include '../load.php';

$category = new Category($dbutil);
$pagedb = new Page($dbutil);
$menus = $category->getAllMenu();

$mainMenu =  $_GET['menu'];
$menuInfo = null;
$pmenu = null;
if(array_key_exists('list', $_GET)){
	foreach ($menus as $menu){
		if($menu['name'] == $mainMenu){
			$pmenu = $menu;
			foreach ($menu['submenu'] as $submenu){
				if($submenu['name'] == $_GET['list']){
					$menuInfo = $submenu;
					$pmenu = $submenu;
					break;
				}
			}
		}
	}
}else{
	foreach ($menus as $menu){
		if($menu['name'] == $mainMenu){
			$menuInfo = $menu;
			$pmenu = $menu;
			break;
		}
	}
}
//如果是三级列表,则获取三级列表信息
if(array_key_exists('ol', $_GET)){
	$menuInfo = $category->getMenuInfoById($_GET['ol']);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iiiviviniko</title> 
<link href="../style/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../js/jquery-1.8.0.min.js" ></script>

<script type="text/javascript" src="../js/listmenu.js"></script>

</head>

<body>
<div class="container">
    <div class="headlogo"><a href="#"><img src="images/logo.jpg" /></a></div>   
    <div class="left-menu">
    	<?php 
    		include 'menulist.php';
    	?>
    </div>
	<div class="rightbox">
    	<div class="cl_content mt20">
			<div class="work">
                <h5>商品助理</h5>
                <p>
                    招聘要求：<br />
                    1、服装设计或者服装工程专业；<br />
                    2、服装设计或者服装工程专业；<br />
                    3、服装设计或者服装工程专业；<br />
                    4、服装设计或者服装工程专业；
                </p>
                <p>
                    工作职责：<br />
                    1、服装设计或者服装工程专业；<br />
                    2、服装设计或者服装工程专业；<br />
                    3、服装设计或者服装工程专业；<br />
                    4、服装设计或者服装工程专业；
                </p>
			</div>
            
        </div>
    </div>
</div>   
</body>
</html>
