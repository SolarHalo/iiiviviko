<?php 
include './site_path.php'; 

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

//如果是三级列表,则获取三级列表信息
if(array_key_exists('ol', $_GET)){
	$menuInfo = $category->getMenuInfoById($_GET['ol']);
}


$pageCount = $pagedb->getPageCountByPid($menuInfo['id']);

$nowpage = (int)($_GET['page']);

$pageInfo = $pagedb->getPageContent($menuInfo['id'], $nowpage);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iiiviviniko</title> 
<link href="style/style.css" type="text/css" rel="stylesheet" />
<link href="style/colorbox.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.8.0.min.js" ></script>

<script type="text/javascript" src="js/listmenu.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/jquery.hoverscroll.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	$(".lookzoom").colorbox({width:"600", height:"100%", inline:true, href:".photo_zoom",scrolling:false,opacity:1});

	$.fn.hoverscroll.params = $.extend($.fn.hoverscroll.params, {
		vertical : true,
		width: 600,
		height: $(window).height(),
		arrows: false
	});
	$('#my-list').hoverscroll();
});
</script>
</head>

<body>
<div class="container">
    <div class="headlogo"><a href="#"><img src="images/logo.jpg" /></a></div>   
    <div class="left-menu">
    	<?php include 'menulist.php'; ?>
    </div>
	<div class="rightbox">
		<div style="display: none; overflow: hidden;">
			<a href="#" class='photo_zoom' onClick="$.colorbox.close();">
				<ul id="my-list">
					<li><img src="<?php echo $pageInfo->imgbig;?>"></img></li>
				</ul>
			</a>
			
		</div>
    	<div class="cl_content">
    		<a class="lookzoom" href="#" >
    			<img  src="<?php echo $pageInfo->imgbig;?>" style="max-width: 400px; max-height: 600px;"/>
    		</a>
        </div>
        <div class="cr_content">
        	<span>READY TO WEAR</span>
            <div class="page">
            	<font><?php echo $nowpage;?></font>
                <a <?php if($nowpage > 1 ) { ?> href="content.php?menu=<?php echo $mainMenu; if(array_key_exists('list', $_GET)) echo '&list='.$_GET['list'];
                											if(array_key_exists('ol', $_GET)) echo "&ol=".$_GET['ol'];?>&page=<?php echo ($nowpage-1);?>" <?php } else echo "href='#'";?>>PREVIOUS</a>
                /
                <a <?php if($nowpage < $pageCount ) { ?> href="content.php?menu=<?php echo $mainMenu; if(array_key_exists('list', $_GET)) echo '&list='.$_GET['list'];
                													if(array_key_exists('ol', $_GET)) echo "&ol=".$_GET['ol']; ?>&page=<?php echo ($nowpage+1);?>" <?php } else echo "href='#'";?>>NEXT</a>
            </div>
           
            <a href="contentlist.php?menu=<?php echo $mainMenu; if(array_key_exists('list', $_GET)) echo '&list='.$_GET['list'];
            											if(array_key_exists('ol', $_GET)) echo "&ol=".$_GET['ol'];?>" class="back">&lt;&nbsp;BACK</a>
        </div> 
    </div>
</div>   
</body>
</html>
