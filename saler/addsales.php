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
<style>
@media Print{
	.left{display:none;}
	.footer{display:none;}
	.btn btn-sm btn-primary{display:none;}
	.fff,#fff{display:none;}
	.right{border:none;}
}
</style>
<body>
<?php include "includes/top.php"; ?>
<div class="wrapper">
	<?php
		include "includes/left.php";
	?>
	<div class="right">
		<a href="sales.php" class="btn btn-sm btn-primary" id="fff">View Chart</a>
		<center><br>
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form" class="fff">
				<div class="form-group">
					<select type="select" name="product" class="form-control">
						<option value="0">-- Choose Product--</option>
						<?php
							require_once '../app/Connect.php';
							$sql = "SELECT * FROM `products` WHERE `product_quantity`>0 ORDER BY `product_name` ASC";
							$result = $con->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									echo "<option value='".$row['product_id']."'>".$row['product_name']."</option>";
								}
							}
						 ?>
					</select>
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="quantity" placeholder="Enter Product Quantity" required>
				</div>
					<input type="submit" class="btn btn-primary btn-sm" value="Add Sales">
			</form>
			<?php
				if ($_SERVER['REQUEST_METHOD']=="POST") {
					require_once "../app/Sale.php";
					addSales();

					
				}
			?>
		</center>
		
	</div>
	<div class="footer">
		<center>&copy; college project year &nbsp<?php echo date("Y/M/d"); ?> </center>
	</div>
</div>
<script>
jQuery(document).ready(function(){
jQuery(".right").on('click','.print',function(){
	window.print();
});
});
</script>
</body>
</html>
