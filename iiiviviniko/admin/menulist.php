<a href="menuoperation.php" class="btn">管理菜单</a>
<?php 
    		foreach ($menus as $menu){
    	?>
    	<div >
            <h2 style="margin: 0px; line-height: 20px;"><?php if(count($menu['link']) > 0){
            	echo "<a href='".$root_path."/admin".$menu['link']."?menu=".$menu['name']."' >".$menu['name']."</a>";
            } else echo $menu['name'];?></h2>
            <?php if(array_key_exists('submenu', $menu)){
            ?>
            <ul style="margin: 0px;">
            <?php foreach ($menu['submenu'] as $submenu){
            ?>
                <li><a href="<?php echo $root_path; ?>/admin<?php echo $submenu['link'].'?menu='.$menu['name'].'&list='.$submenu['name'];?>" <?php if(array_key_exists('list', $_GET) && $_GET['list'] == $submenu['name']) echo 'class="active"'?> ><?php echo $submenu['name'];?></a></li>
             <?php }?>
            </ul>
            <?php }?>
        </div>
    	<?php 		
    		}
    	?>