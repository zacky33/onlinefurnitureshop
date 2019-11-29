<div class="top">
	
	<div class="lefttop">Sales Management System</div>
	<div class="righttop">Welcome, <i>
		<?php
		@require "../app/Connect.php";
		$namee = $_SESSION['username'];
				 	$sql = "SELECT * FROM `users` WHERE `username`='$namee'";
				 	$result = $con->query($sql);
				 	if ($result->num_rows> 0) {
				 		while ($row = $result->fetch_assoc()) {
				 			echo  $row['username'];
				 		}
				 	}
		?>
	</i> &nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></div>
</div>