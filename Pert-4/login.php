<?php  
session_start();

if (isset($_SESSION['username']))
{
	header('Location: post.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.0">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<br><br><br><br><br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">Login</div>
					</div>
					<div class="panel-body">
						<form action="check_login.php" method="POST" accept-charset="utf-8">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control">
							</div>
							<input type="submit" name="login" value="Login" class="btn btn-primary">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>