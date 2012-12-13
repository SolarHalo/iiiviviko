<?php
include 'load.php';
include 'CategoryDB.php';

$category = new Category($dbutil);
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

$imgList = $category->getSubMenus($menuInfo['id']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iiiviviniko</title> 
<link href="style/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.8.0.min.js" ></script>

<script type="text/javascript" src="js/listmenu.js"></script>

</head>

<body>
<div class="container">
    <div class="headlogo"><a href="#"><img src="images/logo.jpg" /></a></div>   
    <div class="left-menu">
		<?php include 'menulist.php';?>    	
    </div>
	<div class="rightbox">
    	<div class="cl_content">
    		<ul class="images-list">
    		
    			<?php 
    				foreach ($imgList as $img){
    			?>
    			<li><a href="<?php echo $img->link . "?menu=".$mainMenu; if (array_key_exists('list', $_GET)) echo '&list='.$_GET['list']; echo "&ol=".$img->id;?>"><img src="<?php echo $img->img; ?>" /><font style="display: none;"><?php echo $img->name; ?></font></a></li>
    			<?php
    				}
    			?>
            </ul>
        </div>
        <div class="cr_content">
        	<span>ABOUT<font>&nbsp;<?php if(array_key_exists('list', $_GET)) echo $_GET['list']; else $_GET['menu'];?></font></span>
            <p>
            	<?php echo $menuInfo['desc'];?>
            </p>
            
        </div>
    </div>
</div>   
</body>
</html>
