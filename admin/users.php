<?php 
session_start();
	if (empty($_SESSION['username'])&& empty($_SESSION['admin'])) {
	header("Location: ../index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
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
		<a href="adduser.php" class="btn btn-sm btn-primary">Add New User</a><br><br>
		<table class="table table-bordered">
			<thead>
				<tr class="info">
					<th>Username</th>
					<th>Role</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>	
			</thead>
			<tbody>
				<?php 
				 	@require "../app/Connect.php";
				 	$sql = "SELECT * FROM `users`";
				 	$result = $con->query($sql);
				 	if ($result->num_rows> 0) {
				 		while ($row = $result->fetch_assoc()) {
				 			?>
				 			<tr>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['role']; ?></td>
								<td width="40px"><center><a href="edituser.php?username=<?php echo $row['username']; ?>"><i class="glyphicon glyphicon-edit" style="color:#408080;"></i></a></center></td>
								<td width="40px"><center>
								<a href="deleteuser.php?username=<?php echo $row['username']; ?>" ><i class="glyphicon glyphicon-trash" style="color:red;"></i></a></center></td>
							</tr>
				 			<?php
				 		}
				 	}
				 	else
				 	{
				 		echo "No Users Added";
				 	}
				 ?>
				
			</tbody>
		</table>
        
	</div>
	<div class="footer">
		<center>&copy; college project year &nbsp<?php echo date("Y/M/d"); ?> </center>
	</div>
</div>
</body>
</html>