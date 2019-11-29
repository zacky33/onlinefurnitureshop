<?php 
	function addSales()
	{
		@require 'Connect.php';
		$product = secureinput($_POST['product']);
		$quantity =secureinput($_POST['quantity']);

		

		if (!empty($product)&&!empty($quantity)&&($quantity!=0)) {

		


						$sqll = "SELECT * FROM `products` WHERE `product_id`='$product'";
						$resultt = $con->query($sqll);
						if (!empty($resultt)) {
							$row = $resultt->fetch_array();
							$price = $row['product_price'];
							$name = $row['product_name'];
							$total_price = $price * $quantity;
							$quant = $row['product_quantity'];
							$new_quantity = $quant - $quantity;
							if ($new_quantity < 0) {
								echo "Only ".$quant." ".$name." remain in Store";
							}
							else
							{
								$sql = "INSERT INTO `sales` VALUES ('','$product','$quantity','',CURRENT_TIMESTAMP,".date('d').",".date('m').",".date('Y').")";
								$result = $con->query($sql);
								if (!empty($result)) {
									$id = $con->insert_id;
									$sqlll = "UPDATE `sales` SET `total_price`='$total_price' WHERE `sales_id`='$id'";
									$resulttt = $con->query($sqlll);
									if (!empty($resulttt)) {
										$total = $new_quantity * $price;


									$sql1 = "UPDATE `products` SET `product_quantity`='$new_quantity',`total_amount`='$total' WHERE `product_id`='$product'";
									$result1 = $con->query($sql1);
									if (!empty($result1)) {
										echo "<br><span class='badge badge-info' style='border: 2px #02fca3 dashed;'>
										<p style='text-align:center;'>
											<h2>Sale Receipt</h2><br>
											<h4>Date : ".date("d-m-Y H:i:s")."</h4>
											<h5>Product Id : ".$product."</h5>
											----------------------------------------<br>
											Total Item(s) || ".$quantity."<br>
											----------------------------------------<br>
											Total Amount: <span style='    color: #00ffa3;
																			font-weight: bold;
																			font-size: 20px;'>".$total_price."</span><br><br>
											Thank you for using our services<br>
											~~~Be Blessed~~~
										</p>
										</span><br><br>
										<button class='print' id='fff'>Print this receipt</button><br><br>";
									}
									}
								}
							}
						
					}
				}
				else
				{
					echo "<span class='badge'>All Field are Required</span>";
				}


			
	}

	function secureinput($data)
	{
		$data = trim($data);
   		$data = stripslashes($data);
   		$data = htmlspecialchars($data);
   		return $data;
	}
