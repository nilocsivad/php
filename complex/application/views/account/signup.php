<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$BASE_URL = ( $this->config->item("base_url") );
$URL = ( $BASE_URL . $this->config->item("index_page") );
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
    
	<title>Sign up - Complex</title>
	
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
	function refreshTime() {
		var date = new Date();
		var n_h = date.getHours(), n_m = date.getMinutes(), n_s = date.getSeconds();
		var date_time = (n_h < 10 ? ("0" + n_h) : n_h) + ":" + (n_m < 10 ? ("0" + n_m) : n_m) + ":" + (n_s < 10 ? ("0" + n_s) : n_s);
		document.getElementById("time_dom").innerHTML = date_time;
	}
	function init() {
		var dom_h = 200 + 120;
		var all_h = document.all.calc_dom.offsetHeight - 70;
		var to_h = (all_h - dom_h) / 2 - 1;
		document.getElementById("empty_top").style.height = to_h + "px";
		document.getElementById("empty_middle").style.height = to_h / 2 + "px";
	}
	window.onload = function() {
		window.setInterval(refreshTime, 1000);
		init();
	};
	window.addEventListener("resize", init);
	</script>
	
</head>
<body>
	
	<div id="calc_dom" style="margin:0;padding:0;position:absolute;top:0;left:0;width:100%;height:100%;z-index:-50;"></div>

	<div id="container" class="container">
		
		<div id="empty_top" style="display:block;width:100%;height:0px;"></div>
	
		<div style="display:block;width:100%;height:120px;background:url('<?php echo ( $BASE_URL . "resources/images/signin-bg.png" )?>') no-repeat center;">
	        <p class="text-center" style="color:#ffffff;font-size:30px;height:120px;line-height:120px;">Sign up to <a href="<?php echo $URL?>">Complex</a>.</p>
		</div>
		
		<div id="empty_middle" style="display:block;width:100%;height:0px;line-height:100%;color:#ffffff;font-weight:bold;font-size:20px;"><?php echo ( isset( $_COOKIE["error"]) ? $_COOKIE["error"] : "" )?></div>
		
		<div class="row">
		
			<div class="col-md-offset-1 col-sm-offset-1 col-md-8 col-sm-8">
			
				<form id="signup_form" class="form-horizontal" action="<?php echo ( $URL . "/signin/register" )?>" method="post">
					<div class="form-group">
						<label for="lname" class="col-md-3 col-sm-3 control-label">Email:</label>
						<div class="col-md-9 col-sm-9">
							<input id="lname" class="form-control" name="lname" required autofocus style="width:95%;" type="email" />
						</div>
					</div>
					<div class="form-group">
						<label for="lpass" class="col-md-3 col-sm-3 control-label">Password:</label>
						<div class="col-md-9 col-sm-9">
							<input id="lpass" class="form-control" name="lpass" required style="width:95%;" type="password" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-3 col-sm-offset-3 col-md-9 col-sm-9">
							<input value="Sign up" type="submit" style="margin-top:10px;padding:6px 12px;font-size:14px;font-weight:400;width:95%;line-height:140%;text-align:center;white-space:nowrap;vertical-align:middle;cursor:pointer;background:#3b3b3b;border:1px solid #858585;" onmouseover="this.style.background='#353535';" onmouseout="this.style.background='#3b3b3b';" />
						</div>
					</div>
			        <div class="row">
			        	<div class="col-md-offset-9 col-sm-offset-9 col-xs-offset-6 col-md-3 col-sm-3 col-xs-6">
			        		<a href="<?php echo ( $URL . "/account" )?>" class="text-right" style="display:block;width:80%;">Sign in</a>
			        	</div>
			        </div>
				</form>
			</div>
			
			<div class="col-md-3 col-sm-3">
				<?php date_default_timezone_set("Asia/Shanghai")?>
				<div>
					<dl>
						<dt>Month And Week:</dt>
						<dd><?php echo date("F") ?></dd>
						<dd><?php echo date("l") ?></dd>
					</dl>
					<dl>
						<dt>Date And Time:</dt>
						<dd><?php echo date("Y-m-d") ?></dd>
						<dd id="time_dom"><?php echo date("H:i:s") ?></dd>
					</dl>
				</div>
			</div>
		</div>
			
	</div>

</body>
</html>