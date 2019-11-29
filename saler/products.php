<?php 
session_start();
	if (empty($_SESSION['username'])&& empty($_SESSION['saler'])) {
	header("Location: ../index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/admin.css">
  	<script src="../bootstrap/js/jquery.min.js"></script>
  	<script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "includes/top.php"; ?>
<div class="wrapper">
	<?php
		include "includes/left.php";
	?>
	<div class="right"><br>
		<table class="table table-bordered">
			<thead>
				<tr class="info">
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
				</tr>	
			</thead>
			<tbody>
				<?php 
				 	@require "../app/Connect.php";
				 	$sql = "SELECT * FROM `products` WHERE `product_quantity`>0  ORDER BY `product_name` ASC";
				 	$result = $con->query($sql);
				 	if ($result->num_rows> 0) {
				 		while ($row = $result->fetch_assoc()) {
				 			?>
				 			<tr>
								<td><?php echo $row['product_name']; ?></td>
								<td><?php echo number_format($row['product_price']); ?> Ksh</td>
								<td><?php echo $row['product_quantity']; ?></td>
							</tr>
				 			<?php
				 		}
				 	}
				 	else
				 	{
				 		echo "No Product Added";
				 	}
				 ?>
				
			</tbody>
		</table>
	</div>
	<div class="footer">
		<center>&copy; college project year &nbsp<?php echo date("Y/M/d"); ?> </center>
	</div>
</div>
</body>
</html>