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
    
	<title>Items - Complex</title>
	
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
	}
	a:hover,a:active{
		color:#ffffff;
		text-decoration:underline;
	}
	
	.item{
		float:left;
		color:#ffffff;
		display:block;
		width:150px;
		height:150px;
		line-height:150px;
		text-align:center;
		vertical-align:middle;
		border:4px solid #ffffff;
		-moz-border-radius:50%;
		-webkit-border-radius:50%;
		border-radius:50%;
		margin:10px;
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
	$(function() {
		var area = $("#item-area");
		var area_w = area.width();
		var i_count = area_w % 160;
		area.css("padding-left", (i_count / 2 - 1) + "px");
	});
	</script>
	
</head>
<body>
	
	<div id="calc_dom" style="margin:0;padding:0;position:absolute;top:0;left:0;width:100%;height:100%;z-index:-50;"></div>

	<div id="container" class="container">
		
		<div id="empty_top" style="display:block;width:100%;height:0px;"></div>
	
		<div style="display:block;width:100%;min-height:120px;">
			<div style="display:block;width:100%;height:110px;background:url('<?php echo ( $BASE_URL . "resources/images/signin-bg.png" )?>') no-repeat center;">
		        <p class="text-center" style="color:#ffffff;font-size:30px;height:110px;line-height:110px;">Welcome to Complex.</p>
			</div>
		</div>
		
		<div class="row">
			
			<div id="item-area" class="col-sm-12">
				<?php foreach ( $items as $item ) : ?>
					<a class="item"><?php echo $item["text"]?></a>				
				<?php endforeach;?>
			</div>
		</div>
		
	</div>
</body>
</html>
