<?php 
    		foreach ($menus as $menu){
    	?>
    	<div <?php if($_GET['menu'] == trim($menu['name'])) echo 'class="current"' ; else {?>class="listhidden" style="visibility:hidden;" <?php }?> >
            <h2><?php if(count($menu['link']) > 0){
            	echo "<a href='".$root_path.$menu['link']."?menu=".$menu['name']."' >".$menu['name']."</a>";
            } else echo $menu['name'];?></h2>
            <?php if(array_key_exists('submenu', $menu)){
            ?>
            <ul>
            <?php foreach ($menu['submenu'] as $submenu){
            ?>
                <li><a href="<?php echo $root_path.$submenu['link'].'?menu='.$menu['name'].'&list='.$submenu['name'];?>" <?php if($_GET['menu'] == trim($menu['name']) && array_key_exists('list', $_GET) && $_GET['list'] == $submenu['name']) echo 'class="active"'?> ><?php echo $submenu['name'];?></a></li>
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
