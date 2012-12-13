<?php 
include 'load.php';
include 'CategoryDB.php';
include 'PageDB.php';

$category = new Category($dbutil);
$pagedb = new Page($dbutil);
$menus = $category->getAllMenu();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iiiviviniko</title> 
<link href="style/style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<div class="container">
    <div class="headlogo"><a href="#"><img src="images/logo.jpg" /></a></div>   
    <div class="left-menu">
    	<?php 
    		foreach ($menus as $menu){
    	?>
    	<div class="current" >
            <h2><?php if(count($menu['link']) > 0){
            	echo "<a href='".$menu['link']."?menu=".$menu['name']."' >".$menu['name']."</a>";
            } else echo $menu['name'];?></h2>
            <?php if(array_key_exists('submenu', $menu)){
            ?>
            <ul>
            <?php foreach ($menu['submenu'] as $submenu){
            ?>
                <li><a href="<?php echo $submenu['link'].'?menu='.$menu['name'].'&list='.$submenu['name'];?>" ><?php echo $submenu['name'];?></a></li>
             <?php }?>
            </ul>
            <?php }?>
        </div>
    	<?php 		
    		}
    	?>
    </div>
	<div class="rightbox">
    	<div class="cl_content">
    		<a href="#"><img src="images/homeshow.jpg" /></a>
        </div>
    </div>
</div>   
</body>
</html>
