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
    <!-- 
    	The above 3 meta tags *must* come first in the head; 
    	any other head content must come *after* these tags 
    -->
    
	<title>All Web Sites - Complex</title>
	
	<!-- <link href="<?php echo ( $BASE_URL . "resources/styles/general.css" )?>" rel="stylesheet" type="text/css" /> -->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	
	<style type="text/css">
	</style>
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
	</script>
</head>
<body>

	<div id="container">
		
		<h1><a href="<?php echo $URL?>">Welcome to <b>Complex</b> Development By CodeIgniter!</a></h1>
		<p>
			<a href="<?php echo ( $URL . "/website/add" )?>" style="float:right;">New URL Record</a>
			<span class="clear"></span>
		</p>
	
		<div id="body">
			<table style="text-align:left;border:none;" cellspacing="0">
				<tr>
					<th style="min-width:50px;">No</th>
					<th style="min-width:350px;">URL</th>
					<th style="min-width:200px;">Description</th>
					<th>Operating</th>
				</tr>
				<?php $no = $this->pagination->cur_page * $this->pagination->per_page; ?>
				<?php foreach ($results as $row) :?>
					<?php $no++ ?>
					<tr>
						<td class="top_line" title="<?php echo $no?>"><div class="cell"><?php echo $no?></div></td>
						<td class="top_line" title="<?php echo $row["url"]?>"><div class="cell"><?php echo $row["url"]?></div></td>
						<td class="top_line" title="<?php echo $row["description"]?>"><div class="cell"><?php echo $row["description"]?></div></td>
						<td class="top_line">
							<a href="<?php echo ( $URL . "/website/remove?websiteID=" . $row["websiteID"])?>">Delete</a>
							<span>&nbsp;</span>
							<a href="<?php echo ( $URL . "/website/update?websiteID=" . $row["websiteID"])?>">Update</a>
						</td>
					</tr>
				<?php endforeach;?>
				<tr>
					<td class="top_line" colspan="4">
						<?php echo $this->pagination->create_links()?>
					</td>
				</tr>
			</table>
			<p></p>
			
		</div>
	</div>

</body>
</html>