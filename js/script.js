$(document).ready(function () {

    let $pizza = $('#pizza');
    let $size = $('#size');
    let $sauce = $('#sauce');

    $.ajax({
        type: 'POST',
        url: 'src/getDataPizzeria.php',
        data: '',
        success: function (response) {
            if ('pizza' in response && 'size' in response && 'sauce' in response) {
                let pizza = response.pizza;
                let size = response.size;
                let sauce = response.sauce;

                for (let obj of pizza) {
                    $pizza.append(`<option value="${obj.id}">${obj.name}</option>`);
                }
                for (let obj of size) {
                    $size.append(`<option value="${obj.id}">${obj.size} см</option>`)
                }
                for (let obj of sauce) {
                    $sauce.append(`<option value="${obj.id}">${obj.name}</option>`)
                }
            }
        },
    });

    $pizza.on('change', function () {
        $('#order-pizza').html('');
        $('#order-pizza').append(`Пицца: ` + $(this).find('option:selected').text());
        checkSelections();
    });

    $size.on('change', function () {
        $('#order-size').html('');
        $('#order-size').append(`Размер: ` + $(this).find('option:selected').text());
        checkSelections();
    });

    $sauce.on('change', function () {
        $('#order-sauce').html('');
        $('#order-sauce').append(`Соус: ` + $(this).find('option:selected').text());
        checkSelections();
    });

    function checkSelections() {
        if ($pizza.val() && $size.val() && $sauce.val()) {
            let order = {
                'pizzaId': $pizza.val(),
                'sizeId': $size.val(),
                'sauceId': $sauce.val()
            }
            $.ajax({
                type: 'POST',
                url: 'src/handleOrder.php',
                data: {'order': order},
                success: function (response) {
                    $('#price').html('');
                    $('#price').append(`Цена: ${response} руб.`);
                },
            });
        }
    }

    $('#cancel').on('click', function () {
        //location.reload();
        $pizza.val('');
        $('#order-pizza').html('');
        $size.val('');
        $('#order-size').html('');
        $sauce.val('');
        $('#order-sauce').html('');

        $('#price').html('');
    });

    $('#chose-pizza').on('submit', function (event) {
        event.preventDefault();
        let order = {
            'pizzaId': $pizza.val(),
            'sizeId': $size.val(),
            'sauceId': $sauce.val()
        }
        $.ajax({
            type: 'POST',
            url: 'src/handleCheckOrder.php',
            data: {'order': order},
            success: function (response) {
                console.log(response);
                $('#main').html(`
                    <div class="row justify-content-center">
                      <div class="col-4 bg-body shadow-lg" style="border-radius: 10px">
                        <h2>Ваш Чек по заказу</h2>
                        <h6>Пицца ${$pizza.find('option:selected').text()} размером ${$size.find('option:selected').text()} : </h6>
                        <p>${response.pizza} руб.</p>
                        <h6>Coyc ${$sauce.find('option:selected').text()} : </h6>
                        <p>${response.sauce} руб.</p>
                        <h3>Итог : </h3><p>${response.priceOrder} руб.</p>
                      </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                      <div class="col-4">
                        <button type="button" class="btn btn-lg btn-primary shadow-lg" id="back">Назад</button>
                      </div>
                    </div>
                `);
            },
        });
    });

    $(document).on('click', '#back', function () {
        location.reload();
    });

});