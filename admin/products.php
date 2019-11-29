<?php 
session_start();
	if (empty($_SESSION['username'])&& !empty($_SESSION['admin'])) {
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
	<div class="right">
		<a href="addproduct.php" class="btn btn-sm btn-primary">Add Product</a><br><br>
		<table class="table table-bordered">
			<thead>
				<tr class="info">
					<th>Name</th>
					<th>Purchase</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total Amount</th>
					<th>Edit</th>
					<!--<th>Delete</th>-->
				</tr>	
			</thead>
			<tbody>
				<?php 
				 	@require "../app/Connect.php";
				 	$sql = "SELECT * FROM `products` ORDER BY `product_name` ASC";
				 	$result = $con->query($sql);
				 	if ($result->num_rows> 0) {
				 		while ($row = $result->fetch_assoc()) {
				 			?>
				 			<tr>
								<td><?php echo $row['product_name']; ?></td>
								<td><?php echo number_format($row['product_purchase']); ?> Ksh</td>
								<td><?php echo number_format($row['product_price']); ?> Ksh</td>
								<td><?php echo $row['product_quantity']; ?></td>
								<td><?php echo number_format($row['total_amount'])." Ksh"; ?></td>
								<td width="40px"><center><a href="editproduct.php?id=<?php echo $row['product_id']; ?>"><i class="glyphicon glyphicon-edit" style="color:#408080;"></i></a></center></td>
								<!--<td width="40px"><center><a href="deleteproduct.php?id=<?php echo $row['product_id']; ?>"><i class="glyphicon glyphicon-trash" style="color:red;"></i></a></center></td>-->
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
		<?php
		@require "../app/Connect.php";
		$sql = "SELECT sum(total_amount) AS bb FROM `products`";
				$result = $con->query($sql);
				while ($row = $result->fetch_array()) {
					echo "<div class='total'><b>Total Amount is: ".number_format($row['bb'])." Ksh</b></div>";
				}
		?>
	</div>
	<div class="footer">
		<center>&copy; college project year &nbsp<?php echo date("Y/M/d"); ?> </center>
	</div>
</div>
</body>
</html>