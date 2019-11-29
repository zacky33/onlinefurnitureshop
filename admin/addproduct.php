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
			<form action="" method="POST" role="form">
				<div class="form-group">
					<input type="text" class="form-control" name="name" placeholder="Enter Product Name" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="product_purchase" placeholder="Enter Product purchase price" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="price" placeholder="Enter Product Price" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="quantity" placeholder="Enter Product Quantity" required>
				</div>
					<input type="submit" class="btn btn-primary btn-sm" value="Add Product" name="ok">
			</form>
			<?php
		include('conn.php');
		if (isset($_POST['ok'])){
			$name  = $_POST['name'];
			$product_purchase=$_POST['product_purchase'];
			$price =$_POST['price'];
			$quantity = $_POST['quantity'];
			$total_amount = $price * $quantity;
			
			
		$query=mysql_query("INSERT INTO products (product_name,product_purchase,product_price,product_quantity,date_added,day,month,year,total_amount) VALUES
		('$name','$product_purchase','$price','$quantity',CURRENT_TIMESTAMP,".date('d').",".date('m').",".date('Y').",'$total_amount' )") or die(mysql_error());	
			
			
			//,
			
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