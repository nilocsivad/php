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
    
	<title>All Web Site - Complex</title>
	
	<!-- <link href="<?php echo ( $BASE_URL . "resources/styles/general.css" )?>" rel="stylesheet" type="text/css" /> -->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	
	<style type="text/css">
	* {
		margin:0;
		padding:0;
	}
	
	body {
		background-color:#fff;
		font:13px/20px normal Helvetica, Arial, sans-serif;
		color:#4F5155;
	}
	
	#container {
		min-height:1500px;
	}
	
	#body {
		padding:8px;
		min-height:1000px;
		border:1px solid #D0D0D0;
		box-shadow:0 0 8px #D0D0D0;
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
	</script>
	
</head>
<body>

	<div id="container" class="container">
		
		<h1><a href="<?php echo $URL?>">Welcome to <b>Complex</b> Develop By CodeIgniter!</a></h1>
		<!-- 
		<p>
			<a href="<?php echo ( $URL . "/website/add" )?>" style="float:right;">New URL Record</a>
			<span class="clear"></span>
		</p>
		 -->
	
		<div id="body">
			
			<table class="table table-condensed table-striped table-hover table-responsive">
				<caption><strong><u>All Web Site</u></strong></caption>
				<thead>
					<tr>
						<th><abbr title="No.N">#</abbr></th>
						<th>URL</th>
						<th>Description</th>
						<th>Operating</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = $this->pagination->cur_page * $this->pagination->per_page; ?>
					<?php foreach ( $results as $row ) :?>
						<?php $no++ ?>
						<tr>
							<td title="<?php echo $no?>"><div class="cell"><?php echo $no?></div></td>
							<td title="<?php echo $row["url"]?>"><div class="cell"><?php echo $row["url"]?></div></td>
							<td title="<?php echo $row["description"]?>"><div class="cell"><?php echo $row["description"]?></div></td>
							<td>
								<a href="<?php echo ( $URL . "/website/remove?websiteID=" . $row["websiteID"])?>">Delete</a>
								<span>&nbsp;</span>
								<a href="<?php echo ( $URL . "/website/update?websiteID=" . $row["websiteID"])?>">Update</a>
							</td>
						</tr>
					<?php endforeach;?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4">
							<?php if ( ! ( $this->pagination !== FALSE) ) :?>
								<?php echo $this->pagination->create_links();?>
							<?php else : ?>
								<p class="text-capitalize text-right"><u><?php echo "only one page.";?></u></p>
							<?php endif?>
						</td>
					</tr>
				</tfoot>
			</table>
			
		</div>
	</div>

</body>
</html>