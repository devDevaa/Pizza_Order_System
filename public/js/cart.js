$(document).ready(function () {
    // when + button click
    $('.btn-plus').click(function () {
        $parentNode = $(this).parents('tr');

        totalCalculation($parentNode);
        summaryCalculation();
    })
    // when - button click
    $('.btn-minus').click(function () {
        $parentNode = $(this).parents('tr');

        totalCalculation($parentNode);
        summaryCalculation();
    })

    // total calculation price
    function totalCalculation($parentNode) {
        $price = Number($parentNode.find('#price').text().replace('MMK', ""));
        $qty = Number($parentNode.find('#qty').val());

        $total = $price * $qty;
        $parentNode.find('#total').html($total);

    }
    // calculate final order price
    function summaryCalculation() {
        $totalPrice = 0;
        $('#dataTable tr').each(function (index, row) {
            $totalPrice += Number($(row).find('#total').text());
        })
        $('#subTotalPrice').html(`${$totalPrice}`);
        $('#finalTotalPrice').html(`${$totalPrice + 3000}`);
    }
});
