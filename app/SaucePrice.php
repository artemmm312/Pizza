<?php

namespace App;

use Core\Pizzeria;

class SaucePrice extends Pizzeria
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'price_sauce';
	}
	
	public function getPriceBySauceId(int $id): ?float
	{
		
		$sql = "SELECT price FROM $this->table WHERE sauce_id = :id";
		$stmt = $this->connection->pdo->prepare($sql);
		$stmt->bindParam(':id', $id);
		if ($stmt->execute()) {
			$array = $stmt->fetchAll();
			return reset($array)['price'];
		}
		return null;
	}
}