<!doctype html>
<html lang="ru" data-bs-theme="dark">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Обалденная Пицца!</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
	        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
	        crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
</head>

<body
	style="background-image: url(img/variety-of-pizzas-on-wooden-background_220925-11937.avif); background-size: 100%;">

<div class="container text-center position-absolute top-50 start-50 translate-middle" id="main">
	<form id="chose-pizza">
		<div class="row justify-content-center mb-5">
			<div class="col-2">
				<select class="form-select form-select-lg bg-body shadow-lg" id="pizza" aria-label="pizza" required>
					<option disabled selected hidden value="">Пицца</option>
				</select>
			</div>
			<div class="col-2">
				<select class="form-select form-select-lg bg-body shadow-lg" id="size" aria-label="size" required>
					<option disabled selected hidden value="">Размер</option>
				</select>
			</div>
			<div class="col-2">
				<select class="form-select form-select-lg bg-body shadow-lg" id="sauce" aria-label="sauce" required>
					<option disabled selected hidden value="">Соус</option>
				</select>
			</div>
		</div>
		<div class="row justify-content-center" id="order-data">
			<div class="col-3 bg-body shadow-lg" style="border-radius: 10px">
				<p class="mt-3" id="order-pizza"></p>
				<p id="order-size"></p>
				<p id="order-sauce"></p>
				<h4 class="mb-3" id="price"></h4>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-2">
				<button type="submit" class="btn btn-lg btn-success mt-5 shadow-lg" id="submit-order">Заказать</button>
			</div>
			<div class="col-2">
				<button type="button" class="btn btn-lg btn-danger mt-5 shadow-lg" id="cancel">Отмена</button>
			</div>
		</div>
	</form>
</div>

<script src="js/script.js"></script>
</body>
</html>
