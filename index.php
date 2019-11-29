<?php 
session_start();
	if (!empty($_SESSION['username'])&& !empty($_SESSION['saler'])) {
	@header("Location: ./saler");
	}
	elseif (!empty($_SESSION['username'])&& !empty($_SESSION['admin'])) {
		@header("Location: ./admin");
	}
	elseif (!empty($_SESSION['username'])&& !empty($_SESSION['manager'])) {
		@header("Location: ./admin");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales Management System</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
  	<script src="bootstrap/js/jquery.min.js"></script>
  	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="wrapper">
	<div class="left">
		<center>
			<h3 style="margin-top:100px;font-family:Arial;letter-spacing:6px;">SALES MANAGEMENT<br><br>SYSTEM</h3>
		</center> 
	</div>
	<div class="right">
		<h3 class="text-center">Login Here</h3><hr>
		<form role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<div class="form-group">
				<input type="text" name="username" placeholder="Enter Username" class="form-control fomu" required><br>
				<input type="password" name="password" placeholder="Enter Password" class="form-control fomu" required><br>
				<input type="submit" class="btn btn-info fomu-btn" value="Login">
			</div>		
		</form>
		<?php
			if ($_SERVER['REQUEST_METHOD']=="POST") {
				require "app/Connect.php";

				require "app/Sale.php";
				$username = secureinput($_POST['username']);
				$password = secureinput($_POST['password']);
				$pass = secureinput(md5(sha1($_POST['password'])));
				if (!empty($username) AND !empty($pass)) {
					$sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$pass'";
					$result = $con->query($sql);
					if ($result->num_rows ==0) {
						echo "<br><b><center>Wrong Username/Password</center></b>";
					}
					else if ($result->num_rows ==1) {
						while ($row =$result->fetch_array()) {
							$role = secureinput($row['role']);
							if ($role =="Admin") {
									session_start();
									$_SESSION['username']=$username;
									$_SESSION['admin']=$role;
									if (!empty($_SESSION['username'])&& !empty($_SESSION['admin']) ) {
										@header("Location: ./admin");
										?>
										<script>
									window.location.assign("http://mcluciana.coderspage.com/admin/");
									</script>
									<?php
									}
									else{
										echo $con->error();
									}
							}
							elseif ($role =="Saler") {
									session_start();
									$_SESSION['username']=$username;
									$_SESSION['saler']=$role;
									if (!empty($_SESSION['username'])&& !empty($_SESSION['saler'])) {
										@header("Location: saler/");
										?>
										<script>
									window.location.assign("http://mcluciana.coderspage.com/saler/");
									</script>
									<?php
									}
							}
							elseif ($role =="Manager") {
									session_start();
									$_SESSION['username']=$username;
									$_SESSION['manager']=$role;
									if (!empty($_SESSION['username'])&& !empty($_SESSION['manager'])) {
										@header("Location: manager/");
										?>
										<script>
									window.location.assign("http://mcluciana.coderspage.com/saler/");
									</script>
									<?php
									}
							}
							else{
								echo "<br><b><center>Wrong Username/Password</center></b>";
							}
						}
						
					}
					else{
						echo "<br><b>Try Again</b>";
					}
				}

			}

		?>
	</div>
	
</div>

</body>
</html>