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
    
	<title>Encrypt - Complex</title>
	
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
	}
	a:hover,a:active{
		color:#ffffff;
		text-decoration:underline;
	}
	
	option {
		display:block;
		height:30px;
		line-height:30px;
		padding-left:8px;
		padding-top:8px;
		_padding-top:8px;
		background:#2b2b2b;;
		border:none;
		border:1px solid #858585;
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
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	
	<script type="text/javascript">
	function encrypt(formID) {

		var v_type = $("#type").find("option:selected").val();
		var v_text = $("#text").val();
		$("#text").attr("placeholder", "Text something");

		if ( v_text == "") {
			$("#text").attr("placeholder", "Text must not be null!");
			return;
		}
		
		$("#encrypt_text").val( "" );

		$.ajax({
			async : true,
			beforeSend : function(jqXHR, settings) {
			},
			cache : false,
			complete : function(jqXHR, textStatus) {
			},
			data : {
				"type" : v_type,
				"text" : v_text
			},
			error : function(jqXHR, textStatus, errorThrown) {
			},
			method : "post",
			statusCode : {
				404 : function() {
				},
				500 : function() {
				}
			},
			success : function(data, textStatus, jqXHR) {
				$("#encrypt_text").val( data );
			},
			timeout : (1000 * 60),
			url : "<?php echo site_url( "security/encrypt" ) ?>"
		});
		
		return false;
	}
	$(function() {
		var w_h = $(window).height();
		var f_h = $("#encrypt_form").height();
		var i_h = 130;
		var t_h = 40;

		var wrap_h = ( w_h - f_h - i_h - t_h );

		var to_h = wrap_h > 0 ? wrap_h / 2 : 0;
		
		document.getElementById("empty_top").style.height = to_h / 2 + "px";
		document.getElementById("empty_middle").style.height = to_h / 4 + "px";
	});
	</script>
	
</head>
<body>
	
	<div id="calc_dom" style="margin:0;padding:0;position:absolute;top:0;left:0;width:100%;height:100%;z-index:-50;"></div>

	<div id="container" class="container">
		
		<div id="empty_top" style="display:block;width:100%;height:0px;"></div>
	
		<div style="display:block;width:100%;min-height:120px;">
			<div style="display:block;width:100%;height:110px;background:url('<?php echo ( $BASE_URL . "resources/images/signin-bg.png" )?>') no-repeat center;">
		        <p class="text-center" style="color:#ffffff;font-size:30px;height:110px;line-height:110px;">Encrypt By <a href="<?php echo site_url() ?>">Complex</a>.</p>
			</div>
		</div>
		
		<div id="empty_middle" style="display:block;width:100%;height:0px;line-height:100%;color:#ffffff;font-weight:bold;font-size:20px;"><?php echo ( isset( $_COOKIE["error"]) ? $_COOKIE["error"] : "" ) ?></div>
	    
		<div class="row">
			<div class="col-md-offset-3 col-md-6 col-sm-12">
				<div id="info_area" style="margin:0px;padding:6px 12px;font-size:14px;font-weight:400;width:100%;line-height:140%;white-space:nowrap;vertical-align:middle;cursor:pointer;background:#2b2b2b;border:1px solid #858585;border-top:none;border-bottom:none;" onmouseover="this.style.background='#404040';" onmouseout="this.style.background='#2b2b2b';">
					Support MD5/SHA1
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
		
		<p>&nbsp;</p>
		
		<form id="encrypt_form" class="form" action="" method="post">
			<div class="row">
				<div class="col-md-offset-3 col-md-6 col-sm-6">
					<input type="text" name="text" id="text" maxlength="32" class="form-control" placeholder="Text something" required autofocus style="width:100%;">
				</div>
				<div class="col-md-3"></div>
			</div>
		
			<p>&nbsp;</p>
		
			<div class="row">
				<div class="col-md-offset-3 col-md-6 col-sm-6">
					<div class="row" style="margin-left:0;margin-right:0;padding-left:0;padding-right:0;">
						<div class="col-md-9 col-sm-7" style="margin-left:0;margin-right:0;padding-left:0;">
							<select id="type" class="form-control" style="background:none;border:none;border-radius:0;border:1px solid #858585;">
								<option value="md5">MD5</option>
								<option value="sha1">SHA1</option>
							</select>
						</div>
						<div class="col-md-3 col-sm-5" style="margin-left:0;margin-right:0;padding-left:0;padding-right:0;">
							<input onclick="return encrypt();" value="Encrypt" type="submit" style="margin:0px;padding:6px 12px;font-size:14px;font-weight:400;width:100%;line-height:140%;text-align:center;white-space:nowrap;vertical-align:middle;cursor:pointer;background:#4c4c4c;border:1px solid #858585;" onmouseover="this.style.background='#404040';" onmouseout="this.style.background='#4c4c4c';" />
						</div>
					</div>
				</div>
			</div>
		
			<p>&nbsp;</p>
		
			<div class="row">
				<div class="col-md-offset-3 col-md-6 col-sm-12">
					<input type="text" id="encrypt_text" class="form-control" placeholder="MD5 Encrypted Text" required readonly style="width:100%;background:#2b2b2b;border-left:none;border-right:none;outline:0px none;">
				</div>
				<div class="col-md-3"></div>
			</div>
		</form>
		
	</div>
</body>
</html>
