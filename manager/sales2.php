<?php 
session_start();
	if (empty($_SESSION['username'])&& empty($_SESSION['saler'])) {
	header("Location: ../index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales</title>
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
		<a href="addsales.php" class="btn btn-sm btn-primary">Buy Products</a><br><br>
		<table class="table table-bordered">
			<thead>
				<tr class="info">
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Total Price</th>
					<th>Date</th>
					<!--<th>Edit</th>-->
				</tr>	
			</thead>
			<tbody>
				<?php 
				$tot=0;
				 	@require "../app/Connect.php";
				 	$sql = "SELECT * FROM `sales` ORDER BY `sales_id` DESC";
				 	$result = $con->query($sql);
				 	if ($result->num_rows> 0) {
				 		while ($row = $result->fetch_assoc()) {
				 			?>
				 			<tr>
								<td># <?php
								$sqll = "SELECT * FROM `products` WHERE `product_id`='".$row['product_id']."'";
							 	$resultt = $con->query($sqll);
							 	if ($resultt->num_rows> 0) {
							 		while ($roww = $resultt->fetch_assoc()) {
							 			echo $roww['product_name'];
							 		} }
								 ?>
								 </td>
								<td><?php echo $row['quantity']; ?></td>
								<td><?php echo number_format($row['total_price']); ?> Ksh</td>
								<?php $tot+=$row['total_price']; ?>
								<td><?php echo $row['date_added']; ?></td>
								<!--<td width="40px"><center><a href="editsales.php?sales_id=<?php echo $row['sales_id']; ?>"><i class="glyphicon glyphicon-edit"></i></a></center></td>-->
							</tr>

				 			<?php
				 		}
				 	}
				 	else
				 	{
				 		echo "No Sales Available";
				 	}
				 ?>
				 			<tr>
							
							<td colspan="3" style="text-align:right;" class="info">Total &nbsp Ksh.<?php echo number_format($tot); ?></td>
							
							</tr>
				
			</tbody>
		</table>
	</div>
	<div class="footer">
		<center>&copy; college project year &nbsp<?php echo date("Y/M/d"); ?> </center>
	</div>
</div>
</body>
</html>