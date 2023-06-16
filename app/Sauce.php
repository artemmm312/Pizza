<?php

namespace App;

use Core\Pizzeria;

class Sauce extends Pizzeria
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'sauce';
	}
}