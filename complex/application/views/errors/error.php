<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$URL = ( $this->config->item("base_url") . $this->config->item("index_page") );
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
	
	* {
		margin: 0;
		padding: 0;
	}

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}
	
	p {
		height: 40px;
		line-height: 40px;
	}
	
	ul, ol, li {
		list-style: none;
	}

	h1, h2, h3, h4, h5, h6 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 120%;
		font-weight: normal;
		margin: 10px 0;
		padding: 10px;
	}
	
	input {
		outline: none;
		padding: 2px;
	}
	
	input[type=button], input[type=reset], input[type=submit] {
		outline: none;
		padding: 4px 6px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	#container {
		margin: 10px;
		padding: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	<script type="text/javascript">
	function go_back() {
		window.history.back();
	}
	</script>
</head>
<body>

	<div id="container">
	
		<h1><a href="<?php echo $URL?>">Welcome to <b>Complex</b> Development By CodeIgniter!</a></h1>
	
		<div id="body">
		
			<p><span id="error_msg" style="color:red;font-size:20px;"><?php echo $error?></span></p>
			<p><a href="javascript:go_back()">Back</a></p>
		</div>
	</div>

</body>
</html>