<?php

namespace App;

class Order
{
	private float $rateBYN;
	public PizzaPrice $pizzaPrice;
	private SaucePrice $saucePrice;
	private Size $pizzaSize;
	
	public function __construct()
	{
		$this->pizzaPrice = new PizzaPrice();
		$this->saucePrice = new SaucePrice();
		$this->pizzaSize = new Size();
		$this->rateBYN = $this->getRateBYNofUSD();
	}
	
	private function getRateBYNofUSD(): float
	{
		$url = 'https://api.nbrb.by/exrates/rates/431';
		$response = file_get_contents($url);
		$data = json_decode($response, true);
		return $data['Cur_OfficialRate'];
	}
	
	public function getPriceByOrder($data_order): float
	{
		$pricePizza = $this->pizzaPrice->getPriceByPizzaId($data_order['pizzaId']);
		$priceSauce = $this->saucePrice->getPriceBySauceId($data_order['sauceId']);
		$pricePizzaMultiplier = $this->pizzaSize->getPriceMultiplierById($data_order['sizeId']);
		$priceOrder = (($pricePizza * $pricePizzaMultiplier) * $this->rateBYN) + $priceSauce * $this->rateBYN;
		return round($priceOrder, 2);
	}
	
	public function getCheckByOrder($data_order): array
	{
		$pricePizza = $this->pizzaPrice->getPriceByPizzaId($data_order['pizzaId']);
		$priceSauce = $this->saucePrice->getPriceBySauceId($data_order['sauceId']);
		$pricePizzaMultiplier = $this->pizzaSize->getPriceMultiplierById($data_order['sizeId']);
		
		$pricePizza = round(($pricePizza * $pricePizzaMultiplier) * $this->rateBYN, 2);
		$priceSauce = round($priceSauce * $this->rateBYN, 2);
		$priceOrder = $pricePizza + $priceSauce;
		return [
			'pizza' => $pricePizza,
			'sauce' => $priceSauce,
			'priceOrder' => $priceOrder,
		];
	}
}