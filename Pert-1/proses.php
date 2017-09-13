<?php 
// echo "Ini script PHP" . "<br>";

// echo $_GET["nama"] . "<br>";
// echo $_GET["umur"] . "<br>";

// $judul = "Praktikum";
// $nama = "Kelas A";

// concat operator .
// echo $judul . " " . $nama;

// superglobal variable
// echo "Nama saya adalah ". $_POST["nama"];
// echo "Umur saya adalah ". $_POST["umur"];
// var_dump($_POST);
// echo $_POST["tambah"];

// if (2 == 3 && 2 == 2 || 1 == 1)
// {
// 	// code
// }
// else
// {
// 	// code
// }

// while(1 > 2)
// {
// 	// code
// }

// do
// {
// 	// code
// }
// while (2 < 1);

// for ($i = 0; $i < 10; $i++)
// {
// 	echo $i . "<br>";
// }

// $nama = ["Fajri", "Henzo"];
// echo $nama[0];
// foreach ($nama as $key => $n)
// {
// 	echo $key . ": " . $n . "<br>";
// }

foreach ($_POST as $key => $input)
{
	echo $key . ": " . $input . "<br>";
}

?>








