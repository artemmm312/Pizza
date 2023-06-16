<?php

namespace DataBase;

interface ConnectionInterface
{
	public static function getInstance(): ConnectionInterface;
}