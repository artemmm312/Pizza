<?php

namespace App;

use Core\Pizzeria;

class PizzaPrice extends Pizzeria
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'price_pizza';
	}
	
	public function getPriceByPizzaId(int $id): ?float
	{
		$sql = "SELECT price FROM $this->table WHERE pizza_id = :id";
		$stmt = $this->connection->pdo->prepare($sql);
		$stmt->bindParam(':id', $id);
		if ($stmt->execute()) {
			$array = $stmt->fetchAll();
			return reset($array)['price'];
		}
		return null;
	}
}