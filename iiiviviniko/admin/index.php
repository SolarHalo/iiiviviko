<?php
include '../load.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iiiviviniko</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
<meta name="description" content=""></meta>
<meta name="author" content=""></meta>

<!-- Le styles -->
<link href="../css/bootstrap.min.css" rel="stylesheet"></link>
<style type="text/css">
body {
	padding-top: 40px;
	padding-bottom: 40px;
	background-color: #f5f5f5;
}

.form-signin {
	max-width: 300px;
	padding: 19px 29px 29px;
	margin: 0 auto 20px;
	background-color: #fff;
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
	-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
	box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
}

.form-signin .form-signin-heading,.form-signin .checkbox {
	margin-bottom: 10px;
}

.form-signin input[type="text"],.form-signin input[type="password"] {
	font-size: 16px;
	height: auto;
	margin-bottom: 15px;
	padding: 7px 9px;
}
</style>

<link href="../css/bootstrap-responsive.min.css" rel="stylesheet"></link>
<script src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$('#btn_submit').bind('click', function() {
			   
			});
	});
	 
</script>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="../assets/ico/apple-touch-icon-144-precomposed.png"></link>
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="../assets/ico/apple-touch-icon-114-precomposed.png"></link>
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="../assets/ico/apple-touch-icon-72-precomposed.png"></link>
<link rel="apple-touch-icon-precomposed"
	href="../assets/ico/apple-touch-icon-57-precomposed.png"></link>
<link rel="shortcut icon" href="../assets/ico/favicon.png"></link>
</head>

<body>

<div class="container">

<form class="form-signin" action="./home.php">
<h2 class="form-signin-heading">iiiviviniko</h2>
<input type="text" class="input-block-level" placeholder="Email address"></input>
<input type="password" class="input-block-level" placeholder="Password"></input>
<label class="checkbox"> <input type="checkbox" value="remember-me"></input>
Remember me </label>
<button id="btn_submit" class="btn btn-large btn-primary" type="submit">Sign
in</button></form>

</div>
<!-- /container -->

<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/bootstrap.min.js"></script>


</body>
</html>
