<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Pizza;
use App\Size;
use App\Sauce;

$pizza = new Pizza();
$size = new Size();
$sauce = new Sauce();

$data =
	[
		'pizza' => $pizza->getAll(),
		'size' => $size->getAll(),
		'sauce' => $sauce->getAll(),
	];

header('Content-Type: application/json');
echo json_encode($data);