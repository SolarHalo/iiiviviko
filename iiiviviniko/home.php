<?php 
include 'load.php'; 

$category = new Category($dbutil);
$pagedb = new Page($dbutil);
$menus = $category->getAllMenu();


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<title>III VIVINIKO 时装官网</title> 
<link href="style/style.css" type="text/css" rel="stylesheet" />

</head>

<body>
<div class="container">
    <div class="headlogo"><a href="http://iiiviviniko.com"><img src="images/logo.jpg" /></a></div>   
    <div class="left-menu">
    	<?php 
    		foreach ($menus as $menu){
    	?>
    	<div class="current" >
            <h2><?php if(count($menu['link']) > 0){
            	echo "<a href='".$root_path.$menu['link']."?menu=".$menu['name']."' >".$menu['name']."</a>";
            } else echo $menu['name'];?></h2>
            <?php if(array_key_exists('submenu', $menu)){
            ?>
            <ul>
            <?php foreach ($menu['submenu'] as $submenu){
            ?>
                <li><a href="<?php echo $root_path.$submenu['link'].'?menu='.$menu['name'].'&list='.$submenu['name'];?>" ><?php echo $submenu['name'];?></a></li>
             <?php }?>
            </ul>
            <?php }?>
        </div>
       
    	<?php 		
    		}
    	?>
    	 <div class="current">
        	<a href="http://e.weibo.com/iiiviviniko" class="wblogo" target="_blank"><img src="./images/WB_logo.png" class="wblogo1" /><img src="images/WB_logo2.png" class="wblogo2" /></a>
        </div>
    </div>
	<div class="rightbox">
    	<div class="cl_content">
    		<a href="#"><img src="images/homeshow.jpg" /></a>
        </div>
    </div>
</div>   
</body>
</html>
