<?php 
session_start();
	if (empty($_SESSION['username'])&& empty($_SESSION['admin'])) {
	header("Location: ../index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
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
	<center>
		<div class="box">	
			<h4 align="center">Sales Statistics</h4><hr>
			&nbsp;&nbsp;<b>Today:&nbsp;&nbsp;</b>
			<?php
			require_once "../app/Connect.php";
				$day = date('d');
				$month = date('m');
				$year = date('Y');
				$sql = "SELECT sum(total_price) AS aa FROM `sales` WHERE `day`='$day' AND `month`='$month' AND `year`='$year'";
				$result = $con->query($sql);
				while ($row = $result->fetch_array()) {
					echo number_format($row['aa']);
				}
			?>
			 Ksh<br><br>
			&nbsp;&nbsp;<b>This Month:&nbsp; </b>
			<?php
			require_once "../app/Connect.php";
				$day = date('d');
				$month = date('m');
				$year = date('Y');
				$sql = "SELECT sum(total_price) AS bb FROM `sales` WHERE `month`='$month' AND `year`='$year'";
				$result = $con->query($sql);
				while ($row = $result->fetch_array()) {
					echo number_format($row['bb']);
				}
			?>
			 Ksh<br><br>
			&nbsp;&nbsp;<b>This Year:&nbsp;</b>
			<?php
			require_once "../app/Connect.php";
				$day = date('d');
				$month = date('m');
				$year = date('Y');
				$sql = "SELECT sum(total_price) AS cc FROM `sales` WHERE  `year`='$year'";
				$result = $con->query($sql);
				while ($row = $result->fetch_array()) {
					echo number_format($row['cc']);
				}
			?>
			 Ksh<br><br>
		</div>
	</center><br>
	<h4 align="center">Search Report</h4>
	<center>
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-inline" role="form">
		<div class="form-group">
		<select name="day" class="form-control">
			<option value="">Choose Day</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			<option>13</option>
			<option>14</option>
			<option>15</option>
			<option>16</option>
			<option>17</option>
			<option>18</option>
			<option>19</option>
			<option>20</option>
			<option>21</option>
			<option>22</option>
			<option>23</option>
			<option>24</option>
			<option>25</option>
			<option>26</option>
			<option>27</option>
			<option>28</option>
			<option>29</option>
			<option>30</option>
			<option>31</option>
		</select>
		</div>
		<div class="form-group">
		<select name="month" class="form-control">
			<option value="">Choose Month</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
		</select>
		</div>
		<div class="form-group">
		<select name="year" class="form-control">
			<option value="">Choose Year</option>
			<option>2015</option>
			<option>2016</option>
			<option>2017</option>
			<option>2018</option>
			<option>2019</option>
			<option>2020</option>
			</select>
		</div>
			<div class="form-group">
				<input type="submit" value="View Report" class="btn btn-info">
			</div>
		</form>
		<?php
		if ($_SERVER['REQUEST_METHOD']=="POST") {
			require_once "../app/Connect.php";
			require_once "../app/Sale.php";

			$day = secureinput($_POST['day']);
			$month = secureinput($_POST['month']);
			$year = secureinput($_POST['year']);
			

			if (empty($day) AND empty($month) AND !empty($year)) {
				$sql = "SELECT * FROM `sales` WHERE  `year`='$year' ORDER BY `sales_id` DESC";
				 	$result = $con->query($sql);
				 	if ($result->num_rows> 0) {
				 		?>
				 		<br><table class="table table-bordered">
			<thead>
				<tr class="info">
					<th>Product Id</th>
					<th>Quantity</th>
					<th>Total Price</th>
					<th>Time</th>
				</tr>	
			</thead>
			<tbody>
				 		<?php
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
								<td><?php echo $row['date_added']; ?></td>
							</tr>
							<?php
					}
					echo "
				</tbody>
				</table><h3 align='center'><?php echo $year; ?> Sales:
				";
				$sql = "SELECT sum(total_price) AS aa FROM `sales` WHERE `year`='$year'";
				$result = $con->query($sql);
				while ($row = $result->fetch_array()) {
					echo "is: <b>".number_format($row['aa']);
				}
			?>
			 Ksh
				</b></h3>
				<?php

				}
				else{
					echo "<br><b>No data Available</b>";
				}
			}
				else if (empty($day) AND !empty($month) AND !empty($year)) {
					$sql = "SELECT * FROM `sales` WHERE `month`='$month' AND `year`='$year' ORDER BY `sales_id` DESC";
				 	$result = $con->query($sql);
				 	if ($result->num_rows> 0) {
				 		?>
				 		<br><table class="table table-bordered">
						<thead>
							<tr class="info">
								<th>Product Id</th>
								<th>Quantity</th>
								<th>Total Price</th>
								<th>Time</th>
							</tr>	
						</thead>
						<tbody>
							 		<?php
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
											<td><?php echo $row['date_added']; ?></td>
										</tr>
										<?php
										
								}echo "
											</tbody>
											</table><h3 align='center'><?php echo $year; ?> Sales:
											";
											$sql = "SELECT sum(total_price) AS aa FROM `sales` WHERE `month`='$month' AND `year`='$year'";
											$result = $con->query($sql);
											while ($row = $result->fetch_array()) {
												echo "is: <b>".number_format($row['aa']);
											}
										?>
										 Ksh
											</b></h3>
											<?php
							}
							else{
								echo "<br><b>No data Available</b>";
							}
			}

			else if (!empty($day) AND !empty($month) AND !empty($year)) {
					$sql = "SELECT * FROM `sales` WHERE `day`='$day' AND `month`='$month' AND `year`='$year' ORDER BY `sales_id` DESC";
				 	$result = $con->query($sql);
				 	if ($result->num_rows> 0) {
				 		?>
				 		<br><table class="table table-bordered">
						<thead>
							<tr class="info">
								<th>Product Id</th>
								<th>Quantity</th>
								<th>Total Price</th>
								<th>Time</th>
							</tr>	
						</thead>
						<tbody>
							 		<?php
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
											<td><?php echo $row['date_added']; ?></td>
										</tr>
										<?php
								}
								echo "
											</tbody>
											</table><h3 align='center'><?php echo $year; ?> Sales:
											";
											$sql = "SELECT sum(total_price) AS aa FROM `sales` WHERE `day`='$day' AND `month`='$month' AND `year`='$year'";
											$result = $con->query($sql);
											while ($row = $result->fetch_array()) {
												echo "is: <b>".number_format($row['aa']);
											}
										?>
										 Ksh
											</b></h3>
											<?php
							}
							else{
								echo "<br><b>No data Available</b>";
							}
			}
			else
			{
				echo "<center><br><b>All Input Required</b></center>";
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