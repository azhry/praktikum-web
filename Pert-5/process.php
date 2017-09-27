<?php 
$connection = mysqli_connect('localhost', 'root', '', 'praktikum') or die('Error while establishing database connection');

$response = '-';
if (!empty($_POST['data']))
{
	$data = htmlspecialchars($_POST['data']);
	$sql = 'INSERT INTO post(isi) VALUES("' . $data . '")';
	mysqli_query($connection, $sql);
	$response = $data;
}

echo $response;
?>