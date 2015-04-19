<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$BASE_URL = ( $this->config->item("base_url") );
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link href="<?php echo ( $BASE_URL . "resources/general.css" ) ?>" rel="stylesheet" type="text/css" />
	<style type="text/css">
	</style>
	<script type="text/javascript">
	function go_back() {
		window.history.back();
	}
	</script>
</head>
<body>

	<div id="container">
	
		<h1><a href="<?php echo site_url() ?>">Welcome to <b>Complex</b> Development By CodeIgniter!</a></h1>
	
		<div id="body">
		
			<p><span id="error_msg" style="color:red;font-size:20px;"><?php echo $error?></span></p>
			<p><a href="javascript:go_back()">Back</a></p>
		</div>
	</div>

</body>
</html>