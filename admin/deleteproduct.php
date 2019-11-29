<?php 
session_start();
	if (empty($_SESSION['username'])&& empty($_SESSION['admin'])) {
	header("Location: ../index.php");
	}
 ?>
<?php
   require "../app/Connect.php";
   require "../app/Sale.php";
	$id = secureinput($_GET['id']);
      $sql = "DELETE FROM `products` WHERE `product_id`='$id'";
      $result = $con->query($sql);
      if (!empty($result)) {
      	header("Location: products.php");
      }

?>