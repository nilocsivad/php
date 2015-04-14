<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$URL = ( $this->config->item("base_url") . $this->config->item("index_page") );
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	
	<link href="<?php echo ( $this->config->item("base_url") . "resources/styles/general.css" )?>" rel="stylesheet" type="text/css" />
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
	
		<div id="body">
			<table>
				<tr>
					<th align="left">ID</th>
					<th width="200" align="left">URL</th>
					<th width="200" align="left">Description</th>
				</tr>
				<?php foreach ($results as $row) :?>
					<tr>
						<td title="<?php echo $row["websiteID"]?>"><div class="cell"><?php echo $row["websiteID"]?></div></td>
						<td title="<?php echo $row["url"]?>"><div class="cell"><?php echo $row["url"]?></div></td>
						<td title="<?php echo $row["description"]?>"><div class="cell"><?php echo $row["description"]?></div></td>
					</tr>
				<?php endforeach;?>
				<tr>
					<td colspan="3">
						<?php echo $this->pagination->create_links()?>
					</td>
				</tr>
			</table>
		</div>
	</div>

</body>
</html>