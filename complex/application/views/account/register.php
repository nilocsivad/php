<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$BASE_URL = ( $this->config->item("base_url") );
$URL = ( $BASE_URL . $this->config->item("index_page") );
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link href="<?php echo ( $this->config->item("base_url") . "resources/styles/general.css" )?>" rel="stylesheet" type="text/css" />
	<style type="text/css">
	</style>
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
	};
	</script>
</head>
<body>

	<div id="container">
	
		<h1><a href="<?php echo $URL?>">Welcome to <b>Complex</b> Development By CodeIgniter!</a></h1>
	
		<div id="body">
		
			<div id="left_empty" style="display:inline-block;width:0px;height:160px;margin:0;padding:0;"></div>
			
			<form id="signin_form" action="<?php echo ( $URL . "/signin/register" )?>" style="display:inline-block;width:300px;" method="post">
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
					<input value="Sign up" onclick="return valid();" style="cursor:pointer;" type="submit" />
				</p>
			</form>
		</div>
	</div>

</body>
</html>