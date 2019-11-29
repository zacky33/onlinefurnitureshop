<?php 
session_start();
	if (empty($_SESSION['username'])&& empty($_SESSION['saler'])) {
	header("Location: ../index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Saler Dashboard</title>
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
	<div class="right" style="margin-bottom: -120px;"><br>
		<center><p class="lead">Welcome To Sales Management System</p></center><br>
		<center><h5 style="font-family: serif;margin-top: -32px;text-decoration: underline;"> Below are Available Products </h5></center>			
			
		</div>
		</p>
		<div class="content">
		<a href="addsales.php">
				<?php 
		include('conn.php');
$result=mysql_query("SELECT * FROM products WHERE product_quantity >'0'");
		$count=mysql_num_rows($result);
			for($i=0;$i<$count;$i++){
			$get_id=mysql_result($result,$i,'product_id'); 
			$product_name=mysql_result($result,$i,'product_name');
			$product_price=mysql_result($result,$i,'product_price');
			$product_quantity=mysql_result($result,$i,'product_quantity');

?>

		<div class="news_content" style="">

		<h5 style="text-align: center;"><?php echo $product_name;?></h5>
		price:<i>Ksh <?php echo number_format($product_price);?></i><br/>
		Available:<i><?php echo $product_quantity;?> &nbsp Items</i>
		
		</div>
				<?php } ?>
				</a>
		</div>
	</div>

	<div class="footer">
		<center>&copy; college project year &nbsp<?php echo date("Y/M/d"); ?> </center>
	</div>
</div>
</body>
</html>
<style>


 .news_content {
    background: #337ab7;
    color: white;
    width: 23%;
    font-size: 15px;
    height: 80px;
    border-radius: 5px;
    float: left;
    margin-left: 10px;
    padding: 3px;
    padding-left: 12px;
	margin-bottom: 10px;
 }
 
 #goes{
	 background: white;
    width: 12%;
    padding: 10px;
    float: left;
    margin-left: 73%;
    position: absolute;
 }
.content{
    float: right;
    width: 76%;
    margin-top: -194px;
    margin-right: 5px;
}
 </style>



