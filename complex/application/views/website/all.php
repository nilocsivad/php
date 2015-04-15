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
	
	<link href="<?php echo ( $BASE_URL . "resources/styles/general.css" )?>" rel="stylesheet" type="text/css" />
	<style type="text/css">
	.cell {
		display: block;
		width: 98%;
		overflow: hidden;
	}
	</style>
	<script type="text/javascript">
	</script>
</head>
<body>

	<div id="container">
		
		<h1><a href="<?php echo $URL?>">Welcome to <b>Complex</b> Development By CodeIgniter!</a></h1>
		<p>
			<a href="<?php echo ( $URL . "/website/add")?>" style="float:right;">New URL Record</a>
			<span class="clear"></span>
		</p>
	
		<div id="body">
			<table style="text-align:left;">
				<tr>
					<th style="min-width:50px;">ID</th>
					<th style="min-width:350px;">URL</th>
					<th style="min-width:200px;">Description</th>
					<th>Operating</th>
				</tr>
				<?php foreach ($results as $row) :?>
					<tr>
						<td title="<?php echo $row["websiteID"]?>"><div class="cell"><?php echo $row["websiteID"]?></div></td>
						<td title="<?php echo $row["url"]?>"><div class="cell"><?php echo $row["url"]?></div></td>
						<td title="<?php echo $row["description"]?>"><div class="cell"><?php echo $row["description"]?></div></td>
						<td>
							<a href="<?php echo ( $URL . "/website/remove?websiteID=" . $row["websiteID"])?>">Delete</a>
							<span>&nbsp;</span>
							<a href="<?php echo ( $URL . "/website/update?websiteID=" . $row["websiteID"])?>">Update</a>
						</td>
					</tr>
				<?php endforeach;?>
				<tr>
					<td colspan="4">
						<?php echo $this->pagination->create_links()?>
					</td>
				</tr>
			</table>
			<p></p>
			
		</div>
	</div>

</body>
</html>