@extends('user.layouts.master')

@section('content')
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" id="dataTable">
                        @foreach ($cartList as $item)
                            <tr>
                                <td><img class=" img-thumbnail" src="{{ asset('storage/' . $item->pizza_image) }}"
                                        alt="" style="width: 100px;"></td>
                                <td class="align-middle">{{ $item->pizza_name }}
                                    <input type="hidden" value="{{ $item->user_id }}" class="userId">
                                    <input type="hidden" value="{{ $item->product_id }}" class="productId">
                                    <input type="hidden" value="{{ $item->id }}" class="orderId">
                                </td>

                                <td class="align-middle" id="price">{{ $item->pizza_price }} <span
                                        class=" btn-sm bg-secondary">MMK</span>
                                </td>

                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 130px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-success btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-sm bg-secondary border-0 text-center"
                                            value="{{ $item->qty }}" id="qty">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-success btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>

                                <td class="align-middle col-3"><span
                                        id="total">{{ $item->pizza_price * $item->qty }}</span>
                                    <span class=" btn-sm bg-secondary">MMK</span>
                                </td>
                                <td class="align-middle"><button class="btn btn-sm btn-danger btnRemove" id=""><i
                                            class="fa fa-times"></i></button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6><span id="subTotalPrice">{{ $totalPrice }}</span><span
                                    class=" btn-sm bg-secondary">MMK</span></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">3000<span class=" btn-sm bg-secondary">MMK</span></h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><span id="finalTotalPrice">{{ $totalPrice + 3000 }}</span><span
                                    class=" btn-sm bg-secondary">MMK</span></h5>
                        </div>
                        <button class="btn btn-block btn-success font-weight-bold my-3 py-3 rounded" id="orderBtn">Proceed
                            To
                            Checkout</button>
                        <button class="btn btn-block btn-danger font-weight-bold my-3 py-3 rounded" id="clearBtn">Remove
                            Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection

@section('scriptSource')
    <script src="{{ asset('js/cart.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#orderBtn').click(function() {
                $orderList = [];

                $random = Math.floor(Math.random() * 10000000001);

                $('#dataTable tr').each(function(index, row) {
                    $orderList.push({
                        'userId': $(row).find('.userId').val(),
                        'productId': $(row).find('.productId').val(),
                        'qty': $(row).find('#qty').val(),
                        'total': Number($(row).find('#total').text()),
                        'orderCode': 'POS' + $random
                    })
                })
                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/user/ajax/order',
                    data: Object.assign({}, $orderList),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.href = 'http://localhost:8000/user/homePage';
                        }
                    }
                })
            });
            // Remove Process Order
            $('#clearBtn').click(function() {
                $('#dataTable tr').remove();
                $('#subTotalPrice').html("0");
                $('#finalTotalPrice').html("3000");

                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/user/ajax/clear/cart',
                    dataType: 'json',

                })
            });
            // when cross X button click
            $('.btnRemove').click(function() {
                $parentNode = $(this).parents('tr');
                $productId = $parentNode.find(".productId").val();
                $orderId = $parentNode.find(".orderId").val();
                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/user/ajax/clear/current/product',
                    data: {
                        'productId': $productId,
                        'orderId': $orderId
                    },
                    dataType: 'json',

                })
                $parentNode.remove();
                $totalPrice = 0;
                $('#dataTable tr').each(function(index, row) {
                    $totalPrice += Number($(row).find('#total').text());
                })
                $('#subTotalPrice').html(`${$totalPrice}`);
                $('#finalTotalPrice').html(`${$totalPrice+3000}`);
            })
        });
    </script>
@endsection
