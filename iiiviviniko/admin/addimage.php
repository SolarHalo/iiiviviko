<?php
include '../load.php';

if(!isset($_SESSION['user'])){
	header("Location: index.php");
	ob_end_flush();
}


if(!array_key_exists('pid', $_GET)){
	header("Location: ".$root_path."/404.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" /> 
<title>iiiviviniko</title> 
<link href="../style/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../js/jquery-1.8.0.min.js" ></script>
<script type="text/javascript" src="../js/bootstrap-modal.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet"></link>

</head>
<body>
<div class="container">
    <div class="headlogo"><a href="#"><img src="../images/logo.jpg" /></a></div>  
     <div class="rightbox">
     	<div class="add_content">
    	<fieldset>
    	  <legend>添加内容</legend>
    	  <ul class="nav nav-tabs">
  			<li class="active"><a href="#imageform" data-toggle="tab">上传图片</a></li>
  			<li><a href="#videoform" data-toggle="tab">上传视频</a></li>
		  </ul>
		  <div class="tab-content">
			  <div class="tab-pane active" id="imageform">
			  	<form action="./imageuploaded.php" method="post" enctype="multipart/form-data" class="form-horizontal">
			  		<div class="control-group">
	    				<label class="control-label" for="imgsmall">名称:</label> 
	    				<div class="controls">
		    				<input type="text" name="name"  class="input-xlarge"/>
	    				</div>
	    			</div>
	    			<div class="control-group">
	    				<label class="control-label" for="imgsmall">内容页标题:</label> 
	    				<div class="controls">
		    				<select name="title">
		    					<option value="READY TO WEAR">默认READY TO WEAR</option>
		    					<option value="<?php echo $_GET['list'];?>">显示父分类名称 <?php echo $_GET['list'];?></option>
		    					<option value="<?php echo $_GET['menu']?>">显示主分类名称 <?php echo $_GET['menu']?></option>
		    					<option value="<?php echo $_GET['list']." ".$_GET['menu'];?>">显示父分类名称+主分类名称 <?php echo $_GET['list']." ".$_GET['menu'];?></option>
		    				</select>
	    				</div>
	    			</div>
			  		<div class="control-group">
	    				<label class="control-label" for="imgsmall">图片小:</label> 
	    				<div class="controls">
		    				 <input    type="file" name="imagesmall" class="input-xlarge" />
	    				</div>
	    			</div>
			  		<div class="control-group">
	    				<label class="control-label" for="imgbig">图片大: </label> 
	    				<div class="controls">
		    				<input id="imgbig"   type="file" name="imagebig" class="input-xlarge"  />
	    				</div>
	    			</div>
			  		<div class="control-group">
	    				<label class="control-label" for="desca">描述: </label> 
	    				<div class="controls">
		    				 <textarea id="desca" name="desc" class="span6" rows="5"></textarea>
	    				</div>
	    			</div>
	    			<input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>" />
	    			<input type="hidden" name="type" value="image"/>
	    			<input type="hidden" name="resource" value="<?php if(array_key_exists('HTTP_REFERER', $_SERVER)) echo $_SERVER['HTTP_REFERER']?>" />
	    			<div class="control-group">
	    				<div class="controls">
	    					<input type="submit" class="btn btn-info" value="提交"/>
	    				</div>
	    			</div>
	    		</form>
			  </div>
			  <div class="tab-pane" id="videoform">
			  	<form action="./imageuploaded.php" method="post" enctype="multipart/form-data" class="form-horizontal">
			  		<div class="control-group">
	    				<label class="control-label" for="imgsmall">名称:</label> 
	    				<div class="controls">
		    				<input type="text" name="name"  class="input-xlarge"/>
	    				</div>
	    			</div>
	    			<div class="control-group">
	    				<label class="control-label" for="imgsmall">内容页标题:</label> 
	    				<div class="controls">
		    				<select name="title">
		    					<option value="READY TO WEAR">默认READY TO WEAR</option>
		    					<option value="<?php echo $_GET['list'];?>">显示父分类名称 <?php echo $_GET['list'];?></option>
		    					<option value="<?php echo $_GET['menu']?>">显示主分类名称 <?php echo $_GET['menu']?></option>
		    					<option value="<?php echo $_GET['list']." ".$_GET['menu'];?>">显示父分类名称+主分类名称 <?php echo $_GET['list']." ".$_GET['menu'];?></option>
		    				</select>
	    				</div>
	    			</div>
			  		<div class="control-group">
	    				<label class="control-label" for="imgsmall">图片小:</label> 
	    				<div class="controls">
		    				 <input    type="file" name="imagesmall" class="input-xlarge" />
	    				</div>
	    			</div>
			  		<div class="control-group">
	    				<label class="control-label" for="imagebig">视频: </label> 
	    				<div class="controls">
		    				<textarea id="imagebig" name="imagebig" class="span6" rows="3"></textarea>
		    				<p class="help-block">请粘贴优酷视频通用分享代码,以能够同时适应PC与手机平板电脑的浏览.</p>
	    				</div>
	    			</div>
			  		<div class="control-group">
	    				<label class="control-label" for="desca">描述: </label> 
	    				<div class="controls">
		    				 <textarea id="desca" name="desc" class="span6" rows="5"></textarea>
	    				</div>
	    			</div>
	    			<input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>" />
	    			<input type="hidden" name="type" value="video"/>
	    			<input type="hidden" name="resource" value="<?php if(array_key_exists('HTTP_REFERER', $_SERVER)) echo $_SERVER['HTTP_REFERER']?>" />
	    			<div class="control-group">
	    				<div class="controls">
	    					<input type="submit" class="btn btn-info" value="提交"/>
	    				</div>
	    			</div>
	    		</form>
			  </div>
    		</div>
    	</fieldset>
    	</div>
     </div>
</div>

</body>
</html>