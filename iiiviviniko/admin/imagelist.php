<?php
include '../load.php';


if(isset($_SESSION['user'])){
	header("Location: index.php");
}


$category = new Category($dbutil);
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
		if(trim($menu['name']) == $mainMenu){
			$menuInfo = $menu;
			break;
		}
	}
}

$imgList = $category->getActivits($menuInfo['id']);

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
				'data': {'method': 'delcate', 'id': id},
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
				'data': {'method': 'updatecate', 'id': id, 'name': name, 'desc': desc},
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
		<?php include 'menulist.php';?>    	
    </div>
	<div class="rightbox">
    	<div class="cl_content">
    		<ul class="images-list">
    		
    			<?php 
    				foreach ($imgList as $img){
    			?>
    			<li>
    				<a href="<?php echo $root_path."/admin".$img->link . "?menu=".$mainMenu; if (array_key_exists('list', $_GET)) echo '&list='.$_GET['list']; echo "&ol=".$img->id;?>">
    				<img src="<?php echo $root_path.$img->img; ?>" /><?php echo $img->name; ?>
    				</a>
    					<div class="hide namediv"><?php echo $img->name;?></div>
    					<div class="hide descdiv"><?php echo $img->desc;?></div>
	    				<img src="../images/deleteimage.png" alt="" delid="<?php echo $img->id; ?>" class="deleteimage" style="width: 16px; height: 16px; position:relative; top:-18px; left:-5px;"/>
	    				<img src="../images/edit.png" title="编辑列表" updid="<?php echo $img->id; ?>" class="editmenu" style="width: 16px; height: 16px; position:relative; top:-18px; right:10px;"/>
    			</li>
    			<?php
    				}
    			?>
    			<li>
    				<a href="./addimagelist.php?pid=<?php echo $menuInfo['id']; ?>">
    					<img src="../images/addimage.png" alt="添加图片" />
    					<font style="display: none;">添加列表</font>
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
        	<span>ABOUT<font>&nbsp;<?php if(array_key_exists('list', $_GET)) echo $_GET['list']; else $_GET['menu'];?></font></span>
            <p>
            	<?php echo $menuInfo['desc'];?>
            </p>
            
        </div>
    </div>
</div>   
</body>
</html>
