<?php 
session_start();
	if (empty($_SESSION['username'])&& empty($_SESSION['saler'])) {
	header("Location: ../index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
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
	
		<b>Settings</b>
		<center><br>
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form">
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Enter Current Password" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="p" placeholder="Enter New Password" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="pp" placeholder="Re-enter New Password" required>
				</div>
					<input type="submit" class="btn btn-primary btn-sm" value="Update Password">
			</form>
			<?php
				if ($_SERVER['REQUEST_METHOD']=="POST") {
					require_once "../app/Sale.php";
					extract($_POST);
					$password = md5(sha1(secureinput($_POST['password'])) );
					$p = secureinput($p);
					$pp= secureinput($pp);
					$pass = secureinput(md5(sha1($_POST['p'])));
					if ($p != $pp) {
						echo "<br><b><code>Password Must Match</code></b>";
					}
					else
					{
						@require_once "../app/Connect.php";
						$username = $_SESSION['username'];
						$sql = "UPDATE  `users` SET `password`='$pass' WHERE `username`='$username' AND `password`='$password'";
						$result = $con->query($sql);
						if (!empty($result)) {
							echo "<br><b>Succesifully Updated</b>";
						}
						else{
							echo "";
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