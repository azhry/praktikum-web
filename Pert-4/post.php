<?php  
session_start();
if (!isset($_SESSION['username']))
{
	header('Location: login.php');
	exit;
}

$connection = mysqli_connect('localhost', 'root', '', 'praktikum') or die('Error while establishing database connection');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Post</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<a href="logout.php">Logout</a>
		<form action="post_process.php" method="POST" accept-charset="utf-8">
			<textarea name="isi" class="form-control" rows="8" placeholder="Isi blog post..."></textarea>
			<input type="submit" name="post" class="btn btn-primary" value="Post">
		</form>
		<?php  
			$sql = 'SELECT * FROM post ORDER BY id_post DESC';
			$query = mysqli_query($connection, $sql);
			
			while ($row = mysqli_fetch_array($query))
			{
				echo '<h3>' . $row['isi'] . '</h3>';
			}
		?>
	</div>

	<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>