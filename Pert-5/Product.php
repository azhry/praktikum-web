<?php 

/**
 * 4 pilar
 * - Abstraksi
 * - Enkapsulasi
 * - Inheritance
 * - Polymorphisme
 */

class Product
{
	protected $nama;
	private $jenis;

	public function __construct()
	{
		echo 'Ini dari konstruktor<br>';
	}

	public function set_nama($nama)
	{
		$this->nama = $nama;
	}

	public function get_nama()
	{
		return $this->nama;
	}

	public function __destruct()
	{
		echo '<br>Ini dari destruktor';
	}
}


?>