<?php

namespace App;

use Core\Pizzeria;

class Size extends Pizzeria
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'pizza_size';
	}
	
	public function getPriceMultiplierById(int $id)
	{
		$sql = "SELECT price_multiplier FROM $this->table WHERE id = :id";
		$stmt = $this->connection->pdo->prepare($sql);
		$stmt->bindParam(':id', $id);
		if ($stmt->execute()) {
			$array = $stmt->fetchAll();
			return reset($array)['price_multiplier'];
		}
		return null;
	}
}