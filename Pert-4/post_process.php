<?php  
$connection = mysqli_connect('localhost', 'root', '', 'praktikum') or die('Error while establishing database connection');

if (isset($_POST['isi']))
{
	$isi = htmlspecialchars($_POST['isi']);
	$sql = 'INSERT INTO post(isi) VALUES("' . $isi . '")';
	mysqli_query($connection, $sql);
}

header('Location: post.php');
?>