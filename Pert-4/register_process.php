<?php  
$connection = mysqli_connect('localhost', 'root', '', 'praktikum') or die('Error while establishing database connection');

if (isset($_POST['email'], $_POST['username'], $_POST['password']))
{
	$email 		= $_POST['email'];
	$username	= $_POST['username'];
	$password	= $_POST['password'];
	$sql = 'INSERT INTO user(username, password, email) VALUES("' . $username . '", "' . $password . '", "' . $email . '")';
	mysqli_query($connection, $sql);
}

header('Location: register.php');
?>