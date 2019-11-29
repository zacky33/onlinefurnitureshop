<?php 
session_start();
	if (empty($_SESSION['username'])&& empty($_SESSION['admin'])) {
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
		<a href="products.php" class="btn btn-sm btn-primary">View Product</a>
		<center><br>
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form">
				<div class="form-group">
					<input type="text" class="form-control" name="name" value="

					<?php
							require_once '../app/Connect.php';
							$id = $_GET['id'];
							$sql = "SELECT * FROM `products` WHERE `product_id`='$id'";
							$result = $con->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									echo $row['product_name'];
								}
							}
						 ?>
						 " required >
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="price" value="
					<?php
							require_once '../app/Connect.php';
							$id = $_GET['id'];
							$sql = "SELECT * FROM `products` WHERE `product_id`='$id'";
							$result = $con->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									echo $row['product_price'];
								}
							}
						 ?>

					" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="quantity" value="
					<?php
							require_once '../app/Connect.php';
							$id = $_GET['id'];
							$sql = "SELECT * FROM `products` WHERE `product_id`='$id'";
							$result = $con->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									echo number_format($row['product_quantity']);
								}
							}
						 ?>
					" required>
				</div>
					<input type="submit" class="btn btn-primary btn-sm" value="Update Product">
			</form>
			<?php
				if ($_SERVER['REQUEST_METHOD']=="POST") {
					require_once "../app/editProduct.php";
					@require "../app/Connect.php";
					$id = $_GET['id'];
					$name = secureinput($_POST['name']);
					$price =secureinput($_POST['price']);
					$quantity =secureinput($_POST['quantity']);
					$total = $quantity * $price;

					 $sql1 = "UPDATE `products` SET `product_quantity`='$quantity',`product_price`='$price',`product_name`='$name',`total_amount`='$total' WHERE `product_id`='$id'";
						$result1 = $con->query($sql1);
							if (!empty($result1))
							{
								echo "<span class='badge badge-info'>Successfully Updated</span>";
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