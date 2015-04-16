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
    <!-- <link rel="icon" href="../../favicon.ico"> -->
    
	<title>Welcome to CodeIgniter</title>
	
	<!-- <link href="<?php echo ( $BASE_URL . "resources/styles/general.css" )?>" rel="stylesheet" type="text/css" /> -->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	
	<link rel="stylesheet" href="http://getbootstrap.com/examples/signin/signin.css">
	
	<style type="text/css">
	</style>
	
	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="http://getbootstrap.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
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

	var pattern = new RegExp(/^\w*\d*$/);
	var email_pattern = new RegExp(/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/);

	function error(msg) {
		document.getElementById("error_msg").innerHTML = msg;
	}
	
	function valid() {

		error("");
		
		var form = document.getElementById("signin_form");
		
		var lname = form.lname.value;
		if (lname != "") {
			if (lname.indexOf("@") > 0) {
				if (email_pattern.exec(lname) == null) { // ** 不满足 Email 地址
					error("Incorrect Emaill Address!");
					return false;
				}
			} else if (pattern.exec(lname) == null) {
				error("Only a-z A-Z _ 0-9 can be use!");
				return false;
			}
		} else {
			error("Login name must not be null!");
			return false;
		}

		var lpass = form.lpass.value;
		if (lpass == "") {
			error("Login password must not be null!");
			return false;
		}

		return true;
	}
	
	window.onload = function() {
		/*
		var form_w = 300;
		
		var width = (window.innerWidth || document.body.clientWidth) - 30;
		var half_w = width / 2;

		if (width > form_w) {
			if (half_w > form_w) {
				document.getElementById("left_empty").style.width = (half_w + (half_w - form_w) / 4 - 10) + "px";
			} else {
				document.getElementById("left_empty").style.width = (width - form_w - 30) + "px";
			}
		} else {
			document.getElementById("left_empty").style.width = "0px";
		}
		*/
	};
	</script>
</head>
<body>

	<div id="container">

      <form class="form-signin" id="signin_form" action="<?php echo ( $URL . "/signin/validate" )?>" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="lname" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="lpass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
	
	<!-- 
		<h1><a href="<?php echo $URL?>">Welcome to <b>Complex</b> Development By CodeIgniter!</a></h1>
	
		<div id="body" style="width:100%;height:100%;display:block;">
		
			<div id="left_empty" style="display:inline-block;width:0px;height:160px;margin:0;padding:0;"></div>
			
			<form id="signin_form" action="<?php echo ( $URL . "/signin/validate" )?>" style="display:inline-block;width:300px;" method="post">
				<p class="high"><span id="error_msg" style="color:red;font-size:16px;"><?php echo ( isset($error) ? $error : "" )?></span></p>
				<p class="high">
					<span style="display:inline-block;width:60px;text-align:right;">Name:</span>
					<input name="lname" style="width:210px;" type="text" />
				</p>
				<p class="high">
					<span style="display:inline-block;width:60px;text-align:right;">Password:</span>
					<input name="lpass" style="width:210px;" type="password" />
				</p>
				<p class="high">
					<span style="display:inline-block;width:60px;"></span>
					<input value="Sign in" onclick="return valid();" style="cursor:pointer;" type="submit" />
					<span style="display:inline-block;width:60px;"></span>
					<a href="<?php echo ( $URL . "/signin/page" )?>">Sign up</a>
				</p>
			</form>
		</div>
	 -->
		 
	</div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>