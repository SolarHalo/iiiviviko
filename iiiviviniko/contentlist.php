<?php
include 'load.php';
include 'CategoryDB.php';
include 'PageDB.php';

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

$pages = $pagedb->getPagesAllByPid($menuInfo['id']);

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
    	<?php 
    		include 'menulist.php';
    	?>
    </div>
	<div class="rightbox">
    	<div class="cl_content">
    		<ul class="images-list">
    			<?php 
    				foreach ($pages as $key=>$page){
    			?>
    				<li><a href="content.php?menu=<?php echo $mainMenu; if(array_key_exists('list', $_GET)) echo '&list='.$_GET['list'];
    								 if(array_key_exists('ol', $_GET)) echo "&ol=".$_GET['ol']; ?>&page=<?php echo ($key+1);?>">
    					<img src="<?php echo $page->imgsmall; ?>" />
    					</a>
    				</li>
    			<?php
    				}
    			?>
            </ul>
        </div>
        <div class="cr_content">
        	<span>ABOUT<font>&nbsp;<?php if(array_key_exists('list', $_GET)) echo $_GET['list']; else echo $mainMenu; ?></font></span>
            <p>
            	<?php echo $menuInfo['desc'];?>
            </p>
            
            <?php if(array_key_exists('ol', $_GET)){?>
            	<a href="<?php echo $pmenu['link']?>?menu=<?php echo $mainMenu; if(array_key_exists('list', $_GET)) echo '&list='.$_GET['list'];?>" class="back">&lt;&nbsp;BACK</a>
            <?php }?>
            
        </div>
    </div>
</div>   
</body>
</html>