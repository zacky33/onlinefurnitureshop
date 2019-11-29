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
		<a href="sales.php" class="btn btn-sm btn-primary">View Sales</a>
		<center><br>
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form">
				<div class="form-group">
				<input type="text" disabled="disabled" value="
				<?php
						$id = $_GET['sales_id'];
							@require_once '../app/Connect.php';
							$sql = "SELECT * FROM `sales` WHERE `sales_id`='$id'";
							$result = $con->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$pro = $row['product_id'];
									$sqll = "SELECT * FROM `products` WHERE `product_id`='$pro'";
									$r = $con->query($sqll);
									while ($ro = $r->fetch_array()) {
										echo $ro['product_name'];
									}
								}
							}
						 ?>
				" class="form-control">
						
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="quantity" placeholder="Enter Product Quantity" required>
				</div>
					<input type="submit" class="btn btn-primary btn-sm" value="Update Sale">
			</form>
			<?php
				if ($_SERVER['REQUEST_METHOD']=="POST") {
					require_once "../app/Sale.php";
					@require "../app/Connect.php";
					$id = $_GET['sales_id'];
					$quantity =number_format(secureinput($_POST['quantity']));

					$sql = "SELECT * FROM `sales` WHERE `sales_id`='$id'";
							$result = $con->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$pro = $row['product_id'];
									$sqll = "SELECT * FROM `products` WHERE `product_id`='$pro'";
									$r = $con->query($sqll);
									while ($ro = $r->fetch_array()) {
										$price = $ro['product_price'] * $quantity;

										$sql1 = "UPDATE `sales` SET `quantity`='$quantity',`total_price`='$price' WHERE `sales_id`='$id'";
										$result1 = $con->query($sql1);
											if (!empty($result1))
											{
												echo "<span class='badge badge-info'>Successifully Updated</span>";
											}
									}
								}
							}


					


					 
				}
			?>
		</center>
		
	</div>
	<div class="footer">
		<center>&copy; college project year &nbsp<?php echo date("Y/M/d"); ?> </center>
	</div>
</div>
</body>
</html>