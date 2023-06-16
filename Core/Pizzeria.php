<?php

namespace Core;

use DataBase\ConnectionPDO;

abstract class Pizzeria extends Model
{
	protected function getConnection(): ConnectionPDO
	{
		return ConnectionPDO::getInstance();
	}
	
	public function getAll(): array
	{
		return $this->connection->pdo->query("SELECT * FROM $this->table")->fetchAll();
	}
	
	public function getById(int $id): ?array
	{
		$sql = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = $this->connection->pdo->prepare($sql);
		$stmt->bindParam(':id', $id);
		if ($stmt->execute()) {
			$array = $stmt->fetchAll();
			return reset($array);
		}
		return null;
	}
}