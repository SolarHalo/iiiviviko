<?php
include './load.php';

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
<meta http-equiv="X-UA-Compatible" content="IE=9" /> 
<title>iiiviviniko</title> 
<link href="style/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.8.0.min.js" ></script>

<script type="text/javascript" src="js/listmenu.js"></script>

</head>

<body>
<div class="container">
    <div class="headlogo"><a href="#"><img src="./images/logo.jpg" /></a></div>   
    <div class="left-menu">
    	<?php 
    		include 'menulist.php';
    	?>
    </div>
	<div class="rightbox">
    	<div class="cl_content mt20">
			<div class="work">
                <h5>商品助理:</h5>
                <p>
                    招聘要求：<br />
             1、服装设计或服装工程专业; <br/>
						 2、对时尚嗅觉灵敏，喜欢流行事物; <br/>
						 3、书面文字表达能力强。


                </p>
                <p>
                    工作职责：<br />
                1、与各部门的信息传递工作;<br />
								2、商品文字类的描述;<br />
								3、商品培训会，订货会的相关工作。 
                </p>
 <br/>
 
 
   <h5>陈列助理:</h5>
                <p>
                    招聘要求：<br />
                    1、服装设计或视觉传达专业; <br/>
					2、能熟练操作平面软件PS, AI;<br/>
					3、有时尚感及一走的美术基础和敏锐的色彩平衡感;<br/>
					4、对品牌卖场、产品布置、摆设有较系统的认识。 

                </p>
                <p>
                    工作职责：<br />
                   1、陈列方案的制作及陈列道具的开发; <br/>
				   2、店铺陈列的管理; <br/>
				   3、拍摄工作的配台。

                </p>
			</div>
            
        </div>
    </div>
</div>   
</body>
</html>
