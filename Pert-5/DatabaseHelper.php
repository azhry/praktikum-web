<?php 

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'praktikum');

class DatabaseHelper
{
	private $db;

	public function __construct()
	{
		$dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE;
		try
		{
			$this->db = new PDO($dsn, USERNAME, PASSWORD);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}
	}

	public function select($table, $columns = ['*'], $conditions = [])
	{
		// construct sql string
		$columns 		= implode(',', $columns);
		$cond_keys 		= array_keys($conditions);
		$cond_values	= array_values($conditions);
		$cond_count		= count($conditions);
		$sql			= 'SELECT ' . $columns . ' FROM ' . $table;
		if ($cond_count > 0) 
		{
			$sql .= ' WHERE ';
		}
		for ($i = 0; $i < $cond_count; $i++)
		{
			$sql .= $cond_keys[$i] . '=:' . $cond_keys[$i];
			if ($i < $cond_count - 1)
			{
				$sql .= ' AND ';
			}
		}

		try 
		{
			// prepare sql with prepared statement
			$stmt = $this->db->prepare($sql);
			for ($i = 0; $i < $cond_count; $i++)
			{
				// bind values to avoid sql injection
				$stmt->bindparam(':' . $cond_keys[$i], $cond_values[$i]);
			}

			// execute statement
			$stmt->execute();

			// return the result as array of associative array
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} 
		catch (PDOException $e)
		{
			// exception is thrown, return false
			echo $e->getMessage();
			return FALSE;
		}
	}

	/**
	 * This method is used for retrieving one row of data
	 */
	public static function select_row($table, $columns = ['*'], $conditions = [])
	{
		// construct sql string
		$columns 		= implode(',', $columns);
		$cond_keys 		= array_keys($conditions);
		$cond_values	= array_values($conditions);
		$cond_count		= count($conditions);
		$sql			= 'SELECT ' . $columns . ' FROM ' . $table;
		if ($cond_count > 0) 
		{
			$sql .= ' WHERE ';
		}
		for ($i = 0; $i < $cond_count; $i++)
		{
			$sql .= $cond_keys[$i] . '=:' . $cond_keys[$i];
			if ($i < $cond_count - 1)
			{
				$sql .= ' AND ';
			}
		}

		try 
		{
			// prepare sql with prepared statement
			$stmt = $this->db->prepare($sql);
			for ($i = 0; $i < $cond_count; $i++)
			{
				// bind values to avoid sql injection
				$stmt->bindparam(':' . $cond_keys[$i], $cond_values[$i]);
			}

			// execute statement
			$stmt->execute();

			// return the result as associative array
			return $stmt->fetch(PDO::FETCH_ASSOC);
		} 
		catch (PDOException $e)
		{
			// exception is thrown, return false
			echo $e->getMessage();
			return FALSE;
		}
	}

	public function insert($table, $key_value_pair)
	{
		// construct sql string
		$cond_keys		= array_keys($key_value_pair);
		$cond_values	= array_values($key_value_pair);
		$cond_count		= count($key_value_pair);
		$sql 			= 'INSERT INTO ' . $table . '(' . implode(',', $cond_keys) . ') VALUES(';
		for ($i = 0; $i < $cond_count; $i++)
		{
			$sql .= ':' . $cond_keys[$i];
			if ($i < $cond_count - 1)
			{
				$sql .= ', ';
			}
			else
			{
				$sql .= ')';
			}
		}

		try
		{
			// prepare sql statement
			$stmt = $this->db->prepare($sql);
			for ($i = 0; $i < $cond_count; $i++)
			{
				// bind values to avoid sql injection
				$stmt->bindparam(':' . $cond_keys[$i], $cond_values[$i]);
			}

			// execute statement
			$stmt->execute();

			// insert success
			return TRUE;
		}
		catch (PDOException $e)
		{
			// exception is thrown, return false
			echo $e->getMessage();
			return FALSE;
		}
	}
}

?>