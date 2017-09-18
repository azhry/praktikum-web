<?php 

$arr = [
	'nama' => 'ryan',
	'panggilan' => 'mhamanx'
];

foreach ($arr as $key => $val)
{
	echo $key . ': ' . $val . '<br>';
}

echo json_encode($arr);

$jsonStr = '{"no_peserta": "001","nama": "Azhary Arliansyah","asal_univ":"Universitas Sriwijaya","jurusan":"Teknik Informatika Reguler"}';
$json = json_decode($jsonStr);
var_dump($json);