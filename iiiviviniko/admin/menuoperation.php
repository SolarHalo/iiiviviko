<?php
include '../load.php';

if(!isset($_SESSION['user'])){
	header("Location: index.php");
	ob_end_flush();
}


$category = new Category($dbutil);
$pagedb = new Page($dbutil);
$menus = $category->getAllMenu();
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
<script type="text/javascript" src="../js/jquery.dragsort-0.4.min.js" ></script>
<script type="text/javascript" src="../js/bootstrap-modal.js" ></script>
<script type="text/javascript"><!--
$(document).ready(function(){
	

	$("li").mouseover(function(){
		$(this).children("img").css("display","inline-block");
		}).mouseout(function(){
			$(this).children("img").css("display","none");
			});

	$(".deleteimage").click(function(event){
		var ele = $(this);
		var id = $(this).attr("delid");
		$(".btndelete").attr("delid", id);
		$("#deleteModal").modal({
			backdrop:true,
		    keyboard:true,
		    show:true
			});
		
	});

	$(".btndelete").click(function(){
		
		var ele = $(this);

		ele.html("删除中...");
		ele.addClass("disabled");
		
		var id = $(this).attr("delid");
		$.ajax({
			'url': "./ajaxoperation.php",
			'data': {'method': 'delcate', 'id': id},
			'success': function (data){

				$(".deleteimage[delid='"+id+"']").parent("li").remove();
				
				ele.html("确认删除");
				ele.removeClass("disabled");
				$("#deleteModal").modal('hide');
			}
			});
		});


	$(".editmenu").click(function(){
		var ele = $(this);
		var id = $(this).attr("savid");
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
					var paele = $(".editmenu[savid='"+id+"']").parent("li");
					paele.children(".namediv").html(name);
					paele.children(".descdiv").html(desc);
					ele.html("确认保存");
					ele.removeClass("disabled");
					$("#saveModal").modal('hide');
				}
				});
		});

	$(".startsort").click(function(){
		if($(this).html() == '开始排序'){
			$("ul").dragsort({ dragSelector: "li", dragEnd: function() { }, dragBetween: false, placeHolderTemplate: "<li></li>" });
			$(this).html("取消排序");
			$(".savesort").show();
		}else if($(this).html() == "取消排序"){
			$(this).html("开始排序");
			$.dragsort.stop("ul");
			$(".savesort").hide();
		}
		
		});

	$(".savesort").click(function(){
		var ele = $(this);
		ele.html("保存中...");
		ele.addClass("disabled");
		var ids = [];
		$("ul").children("li").each(function(){
			ids.push($(this).attr("mid"));
			});
		$.ajax({
			'url': "./ajaxoperation.php",
			'data': {'method': 'updatecatesort', 'id': ids},
			'success': function (data){
				ele.html("保存排序");
				ele.removeClass("disabled");
				ele.hide();
				$(".startsort").html("开始排序");
				$.dragsort.stop("ul");
			}
			});
		});

});

</script>
</head>
<body>
<div class="container">
    <div class="headlogo"><a href="#"><img src="../images/logo.jpg" /></a></div>  
     <div class="rightbox">
     <h2>管理菜单</h2>
     <br />
     <a href="#" class="btn startsort">开始排序</a>
     <a href="#" class="btn btn-primary savesort hide">保存排序</a>
     <a href="./addmenu.php" class="btn">添加菜单</a>
     <br /><br />
     	<ul class="dragsort_main">
     	<?php 
    		foreach ($menus as $menu){
    	?>
	    	<li class="current" style="margin-bottom: 10px;" mid="<?php echo $menu['id'];?>" >
	            <div class="namediv" style="display: inline; font-size: 18px;font-weight: bold;"><?php echo $menu['name'];?>
	            </div>
	             <div class="hide descdiv"><?php echo $menu['desc']; ?></div>
	             <img src="../images/edit.png" title="编辑菜单" savid="<?php echo $menu['id']; ?>" class="editmenu" style="display: none;width: 16px; height: 16px; float: none;margin: 0;"/>
	                <img src="../images/deleteimage.png" title="删除菜单" delid="<?php echo $menu['id']; ?>" class="deleteimage"  style="display: none;width: 16px; height: 16px; float: none;margin: 0;"/>
	            <?php if(array_key_exists('submenu', $menu)){
	            ?>
	            <ul>
	            <?php foreach ($menu['submenu'] as $submenu){
	            ?>
	                <li mid="<?php echo $submenu['id'];?>"><div class="namediv" style="display: inline;"><?php echo $submenu['name'];?></div>
	                <div class="hide descdiv"><?php echo $submenu['desc']; ?></div>
	                 <img src="../images/edit.png" title="编辑菜单" savid="<?php echo $submenu['id']; ?>" class="editmenu" style="display: none;width: 16px; height: 16px; float: none;margin: 0;"/>
	                <img src="../images/deleteimage.png" title="删除菜单" delid="<?php echo $submenu['id']; ?>" class="deleteimage"  style="display: none;width: 16px; height: 16px; float: none;margin: 0;"/>
	                
	                </li>
	             <?php }?>
	            </ul>
	            <?php }?>
	        </li>
    	<?php 		
    		}
    	?>
    	</ul>
     </div>
     
      <div id="deleteModal" class="modal hide fade">
      	 <div class="modal-header">
              <a class="close" data-dismiss="modal" >&times;</a>
              <h3>删除确认?</h3>
         </div>
         <div class="modal-body">
         	<div class="alert alert-error">删除菜单会将菜单下的所有内容删除,是否确认删除该菜单?</div>
         </div>
         
         <div class="modal-footer">
              <a href="#" class="btn" data-dismiss="modal" >取消</a>
              <a href="#" class="btn btn-primary btndelete">确认删除</a>
         </div>
      </div>
      
      <div id="saveModal" class="modal hide fade">
      	 <div class="modal-header">
              <a class="close" data-dismiss="modal" >&times;</a>
              <h3>编辑菜单</h3>
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
</div>

</body>
</html>