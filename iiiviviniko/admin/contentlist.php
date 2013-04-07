<?php
include '../load.php';

if(!isset($_SESSION['user'])){
	header("Location: index.php");
	ob_end_flush();
}


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
					$pmenu = $submenu;
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
<meta http-equiv="X-UA-Compatible" content="IE=8" /> 
<title>iiiviviniko</title> 
<link href="../style/style.css" type="text/css" rel="stylesheet" />
   <link href="../css/bootstrap.min.css" rel="stylesheet"></link>
<script type="text/javascript" src="../js/jquery-1.8.0.min.js" ></script>
<script type="text/javascript" src="../js/bootstrap-modal.js" ></script>
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

	$(".editmenu").click(function(){
		var ele = $(this);
		var id = $(this).attr("updid");
		var name = ele.parent("li").children(".namediv").html();
		var desc = ele.parent("li").children(".descdiv").html();
		$("#nameinput").val(name);
		$("#descinput").val(desc);
		$(".btnsave").attr("savid", id);
		
		$("#saveModal").modal({
			backdrop:true,
		    keyboard:true,
		    show:true
			});
		});

	$(".btnsave").click(function(){
			var ele = $(this);
			var id = ele.attr("savid");
			var name = $("#nameinput").val();
			var desc = $("#descinput").val();
			ele.html("保存中...");
			ele.addClass("disabled");
			$.ajax({
				'url': "./ajaxoperation.php",
				'data': {'method': 'updatepage', 'id': id, 'name': name, 'desc': desc},
				'success': function (data){
					var paele = $(".editmenu[updid='"+id+"']").parent("li");
					paele.children(".namediv").html(name);
					paele.children(".descdiv").html(desc);
					ele.html("确认保存");
					ele.removeClass("disabled");
					$("#saveModal").modal('hide');
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
    				<li>
    					<a href="#">
    						<img src="<?php echo $root_path.$page->imgsmall; ?>" />
    					</a>
    					<div class="hide namediv"><?php echo $page->name;?></div>
    					<div class="hide descdiv"><?php echo $page->desc;?></div>
    						<img src="../images/deleteimage.png" title="删除图片" delid="<?php echo $page->id; ?>" class="deleteimage" style="width: 16px; height: 16px; position:relative; top:-18px; left:-5px;" />
    						<img src="../images/edit.png" title="编辑内容" updid="<?php echo $page->id; ?>" class="editmenu" style="width: 16px; height: 16px;  position:relative; top:-18px; right:10px;"/>
    				</li>
    			<?php
    				}
    			?>
    			
    			<li>
    				<a href="./addimage.php?menu=<?php echo $pmenu['name'];?>&list=<?php echo $menuInfo['name'];?>&pid=<?php echo $menuInfo['id']; ?>">
    					<img src="../images/addimage.png" alt="添加图片" />
    				</a>
    			</li>
    			
            </ul>
        </div>
        <div id="saveModal" class="modal hide fade">
	      	 <div class="modal-header">
	              <a class="close" data-dismiss="modal" >&times;</a>
	              <h3>编辑列表描述</h3>
	         </div>
	         <div class="modal-body">
	         	<form action="">
	         		<label>名称</label>
	         		<input id="nameinput" type="text" class="span5" ></input>
	         		<label>描述</label>
	         		<textarea id="descinput" rows="5" cols="50" class="span5"></textarea>
	         	</form>
	         </div>
	         
	         <div class="modal-footer">
	              <a href="#" class="btn" data-dismiss="modal" >取消</a>
	              <a href="#" class="btn btn-primary btnsave">确认保存</a>
	         </div>
	      </div>
        <div class="cr_content">
        	<span>ABOUT<font>&nbsp;<?php if(array_key_exists('list', $_GET)) echo $_GET['list']; else echo $mainMenu; ?></font></span>
            <p>
            	<?php echo $menuInfo['desc'];?>
            </p>
            
            <?php if(array_key_exists('ol', $_GET)){?>
            	<a href="<?php echo $root_path."/admin".$pmenu['link']?>?menu=<?php echo $mainMenu; if(array_key_exists('list', $_GET)) echo '&list='.$_GET['list'];?>" class="back">&lt;&nbsp;BACK</a>
            <?php }?>
            
        </div>
    </div>
</div>   
</body>
</html>
