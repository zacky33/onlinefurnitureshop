<?php
							require 'Connect.php';
							$sql = "SELECT * FROM `products`";
							$result = $con->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									echo "<option value='".$row['product_id']."'>".$row['product_name']."</option>";
								}
							}
?>