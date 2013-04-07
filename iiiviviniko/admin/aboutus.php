<?php
include '../load.php';

if(!isset($_SESSION['user'])){
	header("Location: index.php");
	ob_end_flush();
}


$category = new Category($dbutil);
$pagedb = new Page($dbutil);
$menus = $category->getAllMenu();

$_GET['menu'] = "ABOUT US";

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

$pageinfos = $pagedb->getPagesAllByPid($menuInfo['id']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" /> 
<title>iiiviviniko</title> 
<link href="../style/style.css" type="text/css" rel="stylesheet" />
<link href="../style/colorbox.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../js/jquery-1.8.0.min.js" ></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".deleteimage").click(function(){
			var ele = $(this);
			var id = $(this).attr("delid");
			$.ajax({
				'url': "./ajaxoperation.php",
				'data': {'method': 'delpage', 'id': id},
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
    	<div class="cl_content mt20">
			<div class="aboutustext">
                 <p class="fl">
                 	<img src="../images/textlogo.gif" />创立于2006年，始终以"简单的新鲜感"作为品牌设计理念。主张用最极简的手法，表现对新鲜感的理解。通过对"色彩、素材、体积"这三者关系的重新认识和塑造，并且在服装设计中融入对建筑美学的理解，营造具有时代特征的质感街头风格。 "简单纯粹、廓形鲜明"，具有显著的北欧时装风格。
                 </p>
			</div>
            <div class="aboutusimg">
            <ul class="images-list">
            	<?php foreach ($pageinfos as $page){?>
            	<li><img src="<?php echo $root_path.$page->imgsmall; ?>" />
            		<img src="../images/deleteimage.png" alt="" delid="<?php echo $page->id; ?>" class="deleteimage" style="width: 16px; height: 16px;"/>
            	</li>
            	<?php }?>
            	<li><a href="./addimage.php?pid=<?php echo $menuInfo['id']; ?>">
    					<img src="../images/addimage.png" alt="添加图片" />添加图片
    				</a>
    			</li>
            </ul>
            </div>
            <div class="aboutustel">
            	<img src="../images/tel.gif" />
                Add:  No. 8, 561 Long, Nujiang Road(N), Putuo, Shanghai
            </div>
        </div> 
    </div>
</div>   
</body>
</html>
