<?php

namespace DataBase;

use PDO;
use PDOException;

class ConnectionPDO implements ConnectionInterface
{
	private static ConnectionPDO $instance;
	private PDO $pdo;
	private const DATABASE = 'pizzeria';
	private const HOST = 'localhost';
	private const USER = 'root';
	private const PASSWORD = '';
	
	private function __construct()
	{
		$dsn = "mysql:dbname=" . self::DATABASE . ";host=" . self::HOST;
		$user = self::USER;
		$password = self::PASSWORD;
		$opt = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
		];
		//$this->pdo = new PDO($dsn, $user, $password, $opt);
		try {
			$this->pdo = new PDO($dsn, $user, $password, $opt);
		} catch (PDOException $e) {
			die('Ошибка подключения к базе данных: ' . $e->getMessage());
		}
	}
	
	public static function getInstance(): ConnectionPDO
	{
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function __get(string $name): PDO
	{
		if ($name === 'pdo') {
			return $this->pdo;
		}
	}
	
	private function __clone(): void
	{
	}
	
	public function __wakeup(): void
	{
		throw new \RuntimeException("Cannot unserialize a singleton.");
	}
}