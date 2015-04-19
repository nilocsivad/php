<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$BASE_URL = ( $this->config->item("base_url") );
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo ( $BASE_URL . "resources/icons/complex-logo.ico" )?>">
    
	<title>Sign in - Complex</title>
	
	<link href="<?php echo ( $BASE_URL . "resources/styles/general.css" )?>" rel="stylesheet" type="text/css" />
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	
	<style type="text/css">	
	body {
		background:#2e2e2e;
	}
	
	a:link,a:visited{
		color:#ffffff;
		text-decoration:underline;
	}
	a:hover,a:active{
		color:#6633ff;
		text-decoration:underline;
	}
	
	#signin_form {
		display:block;
		width:100%;
		min-height:120px;
	}
	</style>
	
	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]> <![endif]--><!-- <script src="http://getbootstrap.com/assets/js/ie8-responsive-file-warning.js"></script> -->
    <!-- <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script> -->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
	function init() {
		var dom_h = 200 + 120;
		var all_h = document.all.calc_dom.offsetHeight - 70;
		var to_h = (all_h - dom_h) / 2 - 1;
		document.getElementById("empty_top").style.height = to_h + "px";
		document.getElementById("empty_middle").style.height = to_h / 2 + "px";
	}
	window.addEventListener("load", init);
	window.addEventListener("resize", init);
	</script>
	
</head>
<body>
	
	<div id="calc_dom" style="margin:0;padding:0;position:absolute;top:0;left:0;width:100%;height:100%;z-index:-50;"></div>

	<div id="container" class="container">
		
		<div id="empty_top" style="display:block;width:100%;height:0px;"></div>
	
		<div style="display:block;width:100%;min-height:200px;">
			<h1 class="text-center text-uppercase" style="color:#ffffff;font-size:60px;height:60px;">Welcome to here!</h1>
			<div style="display:block;width:100%;height:100px;background:url('<?php echo ( $BASE_URL . "resources/images/signin-bg.png" )?>') no-repeat center;">
		        <p class="text-center" style="color:#ffffff;font-size:30px;height:100px;line-height:100px;">Sign in to <a href="<?php echo site_url() ?>">Complex</a>.</p>
			</div>
		</div>
		
		<div id="empty_middle" style="display:block;width:100%;height:0px;line-height:100%;color:#ffffff;font-weight:bold;font-size:20px;"><?php echo ( isset( $_COOKIE["error"]) ? $_COOKIE["error"] : "" ) ?></div>
	    
		<form id="signin_form" class="form" action="<?php echo site_url( "account/validate" ) ?>" method="post">
		
	        <div class="row">
	        	<div class="col-md-6 col-sm-6 col-xs-12">
        			<input name="lname" type="email" id="inputEmail" maxlength="64" class="form-control" placeholder="Email address" required autofocus style="width:100%;">
	        	</div>
	        	<div class="col-md-6 col-sm-6 col-xs-12">
        			<input name="lpass" type="password" id="inputPassword" maxlength="16" class="form-control" placeholder="Password" required style="width:100%;">
	        	</div>
	        </div>
	        
	        <p style="height:20px;line-height:20px;">&nbsp;</p>
	        
	        <button class="btn btn-lg btn-success btn-block" style="border-radius:0;" type="submit">Sign in</button>
	        
	        <div class="row">
	        	<div class="col-md-offset-9 col-sm-offset-9 col-xs-offset-6 col-md-3 col-sm-3 col-xs-6">
	        		<a href="<?php echo site_url( "account/signup" ) ?>" class="text-right" style="display:block;width:100%;">Sign up</a>
	        	</div>
	        </div>
			
      	</form>

   	</div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo ( $BASE_URL . "resources/scripts/ie10-viewport-bug-workaround.js" )?>"></script>

</body>
</html>