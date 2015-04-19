<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$BASE_URL = ( $this->config->item("base_url") );
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link href="<?php echo ( $BASE_URL . "resources/styles/general.css" )?>" rel="stylesheet" type="text/css" />
	<style type="text/css">
	</style>
	<script type="text/javascript">
	function valid() {
		var form = document.getElementById("website_new_form");
		var v_url = form.url.value;
		if (v_url != "" && (v_url.search("http://\w?") == 0 || v_url.search("https://\w?") == 0)) {
			return true;
		} else {
			document.getElementById("error_msg").innerHTML = ("is not a URL!");
			return false;
		}
	}
	</script>
</head>
<body>

	<div id="container">
	
		<h1><a href="<?php echo site_url() ?>">Welcome to <b>Complex</b> Development By CodeIgniter!</a></h1>
		<p>
			<a href="<?php echo site_url( "website/all" )?>" style="float:right;">All URL Record</a>
			<span class="clear"></span>
		</p>
	
		<div id="body">
		
			<form id="website_new_form" action="<?php echo site_url( "website/insert" ) ?>" method="post">
				<p class="high">
					<span style="display:inline-block;width:80px;text-align:right;">URL:</span>
					<input name="url" style="width:300px;" type="text" />
					<span id="error_msg" style="color:red;font-size:20px;"></span>
				</p>
				<p class="high">
					<span style="display:inline-block;width:80px;text-align:right;">Description:</span>
					<input name="description" style="width:300px;" type="text" />
				</p>
				<p class="high">
					<span style="display:inline-block;width:80px;"></span>
					<input value="Insert" onclick="return valid();" style="cursor:pointer;" type="submit" />
				</p>
			</form>
		</div>
	</div>

</body>
</html>