<?php  
include_once 'Product.php';

class Book extends Product 
{
	// overriding
	public function __construct()
	{
		echo 'Ini dari konstruktor buku<br>';
	}

	public function set_nama($nama)
	{
		$this->nama = 'Produk ini adalah ' . $nama;
	}

	// method overloading
}

$book = new Book();
$book->set_nama('monyet darwin');
echo $book->get_nama();

?>