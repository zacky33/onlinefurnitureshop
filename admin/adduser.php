<?php 
session_start();
	if (empty($_SESSION['username'])&& empty($_SESSION['admin'])) {
	header("Location: ../index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
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
					<input type="text" class="form-control" name="username" placeholder="Enter Username" required>
				</div>
				<div class="form-group">
				<select name="role" class="form-control">
					<option value="">Choose Role</option>
					<option>Saler</option>
					<option>Manager</option>
					<option>Admin</option>
				</select>	
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Enter Password" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password2" placeholder="Re-enter Password" required>
				</div>
					<input type="submit" class="btn btn-primary btn-sm" value="Add User">
			</form>
			<?php
				if ($_SERVER['REQUEST_METHOD']=="POST") {
					require_once "../app/Connect.php";
					require_once "../app/Sale.php";
					$username = secureinput($_POST['username']);
					$password = secureinput($_POST['password']);
					$role = secureinput($_POST['role']);
					$password2 = secureinput($_POST['password2']);
					$pass = secureinput(md5(sha1($password)));
					if ($password != $password2) {
						echo "<br><b>Password Must Match</b>";
					}
					else
					{
						$sql = "INSERT INTO `users` VALUES ('$username','$role','$pass')";
						$result = $con->query($sql);
						if (!empty($result)) {
							echo "<br><b class='badge info'>User Successfully Added</b>";
						}
						else{
							echo "<br><b>Choose Another Username</b>";
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