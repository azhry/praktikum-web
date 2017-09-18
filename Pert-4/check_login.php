<?php 
// TODO: login process
session_start();

// koneksi ke database
$connection = mysqli_connect('localhost', 'root', '', 'praktikum') or die('ERROR');

$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

$sql = 'SELECT * FROM user WHERE username="' . $username . '" AND password="' . $password . '"';

$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_array($query);

if ($result)
{
	// echo 'Selamat datang ' . $result['username'];
	$_SESSION['username'] = $result['username'];
	header('Location: post.php');
}
else
{
	echo 'Login gagal. <a href="login.php">Kembali</a>';
}

?>