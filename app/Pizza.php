<?php

namespace App;

use Core\Pizzeria;

class Pizza extends Pizzeria
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'pizza';
	}
	
}