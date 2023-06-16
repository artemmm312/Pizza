<?php

namespace Core;

use DataBase\ConnectionInterface;

abstract class Model
{
	protected ConnectionInterface $connection;
	protected string $table;
	
	public function __construct()
	{
		$this->connection = $this->getConnection();
	}
	
	abstract protected function getConnection(): ConnectionInterface;
}