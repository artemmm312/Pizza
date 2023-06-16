<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Order;

$data = $_POST['order'];

if (!empty($data)) {
	$order = new Order();
	$price = $order->getCheckByOrder($data);
}

header('Content-Type: application/json');
echo json_encode($price);