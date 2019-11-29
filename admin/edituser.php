<?php 
session_start();
	if (empty($_SESSION['username'])&& empty($_SESSION['admin'])) {
	header("Location: ../index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
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
		<a href="users.php" class="btn btn-sm btn-primary">View Users</a>
		<center><br>
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form">
				<div class="form-group">
					<input type="text" class="form-control" name="name" value="

					<?php
							require_once '../app/Connect.php';
							$username = $_GET['username'];
							$sql = "SELECT * FROM `users` WHERE `username`='$username'";
							$result = $con->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									echo $row['username'];
								}
							}
						 ?>
						 " required  disabled="disabled">
				</div>
				<div class="form-group">
				<select name="role" class="form-control">
					<option value="">Choose Role</option>
					<option>Saler</option>
					<option>Admin</option>
				</select>	
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Enter Password" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password2" placeholder="Re-enter Password" required>
				</div>
				
					<input type="submit" class="btn btn-primary btn-sm" value="Update User">
			</form>
			<?php
				if ($_SERVER['REQUEST_METHOD']=="POST") {
					require_once "../app/Sale.php";
					@require "../app/Connect.php";
					$username = $_GET['username'];
					$role =secureinput($_POST['role']);
					$password =secureinput($_POST['password']);
					$password2 =secureinput($_POST['password2']);
					$pass = secureinput(md5(sha1($password)));
					if ($password != $password2) {
						echo "<br><b>Password Must Match</b>";
					}
					else{
						$sql1 = "UPDATE `users` SET `role`='$role',`password`='$pass' WHERE `username`='$username'";
						$result1 = $con->query($sql1);
							if (!empty($result1))
							{
								echo "<span class='badge badge-info'>User Successfully Updated</span>";
							}
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