<?php
include './load.php';

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
<title>ABOUT US | III VIVINIKO 时装官网</title> 
<link href="style/style.css" type="text/css" rel="stylesheet" />
 <script type="text/javascript" src="js/jquery-1.8.0.min.js" ></script> 
<script type="text/javascript" src="js/listmenu.js"></script>
<script type="text/javascript" src="js/jquery.hoverscroll.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script> 
<script src="js/ScrollPic.js" type="text/javascript"></script>
</head>

<body>
<div class="container">
    <div class="headlogo"><a href="http://iiiviviniko.com"><img src="images/logo.jpg" /></a></div>   
    <div class="left-menu">
    	<?php include 'menulist.php';?>
    </div>
	 
	<div class="rightbox">
    	<div class="cl_content mt20">
			<div class="aboutustext">
                 <p class="fl">
                 	<img src="images/textlogo.gif" />创立于2006年，始终以"简单的新鲜感"作为品牌设计理念。主张用最极简的手法，表现对新鲜感的理解。通过对"色彩、素材、体积"这三者关系的重新认识和塑造，并且在服装设计中融入对建筑美学的理解，营造具有时代特征的质感街头风格。 "简单纯粹、廓形鲜明"，具有显著的北欧时装风格。
                 </p>
			</div>
            
            
            <!--滚动图片 start--> 
            
			<div class="aboutusimg">
            	<div align="center"> 
                    <div class="rollphotos"> 
                        <div class="blk_29">
                            <div class="LeftBotton" id="LeftArr">
                            </div>
                            <div class="Cont" id="ISL_Cont_1"><!-- 图片列表 begin -->
                                <?php foreach ($pageinfos as $page){?>
                                 <div class="box"> 
             	                   <a class="imgBorder" href="<?php echo $root_path.$page->imgbig; ?>"><img src="<?php echo $root_path.$page->imgsmall;  ?>" width="120" height="80" border=0/></a>
            	                       
                                </div>
                                <?php }?>
                                <!-- 图片列表 end -->
                             </div> 
                            <div class="RightBotton" id="RightArr"></div>
                        </div> 
                        <SCRIPT language=javascript type=text/javascript>
                            <!--//--><![CDATA[//><!--
                            var scrollPic_02 = new ScrollPic();
                            scrollPic_02.scrollContId   = "ISL_Cont_1"; //内容容器ID
                            scrollPic_02.arrLeftId      = "LeftArr";//左箭头ID
                            scrollPic_02.arrRightId     = "RightArr"; //右箭头ID
                    
                            scrollPic_02.frameWidth     = 525;//显示框宽度
                            scrollPic_02.pageWidth      = 123; //翻页宽度
                    
                            scrollPic_02.speed          = 10; //移动速度(单位毫秒，越小越快)
                            scrollPic_02.space          = 10; //每次移动像素(单位px，越大越快)
                            scrollPic_02.autoPlay       = false; //自动播放
                            scrollPic_02.autoPlayTime   = 3; //自动播放间隔时间(秒)
                    
                            scrollPic_02.initialize(); //初始化
                                                
                            //--><!]]>
                        </SCRIPT>
                    </div> 
				</div>
			</div>
            
            <!--滚动图片 end-->
            
            
            
            <div class="aboutustel">
            	<img src="images/tel.gif" />
                上海市普陀区怒江北路561弄8号<br />
                Add:  No. 8, 561 Long, Nujiang Road(N), Putuo, Shanghai
            </div>
        </div> 
    </div>
</div>   
</body>
</html>
