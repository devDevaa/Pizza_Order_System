@extends('admin.layouts.master')
@section('title', 'Order Info Page')

@section('content')

    <!-- PAGE CONTAINER-->
    <div class="page-container">


        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <div class="table-responsive table-responsive-data2">
                            <a href="{{ route('order#list') }}" class="text-dark text-decoration-none mb-3"><i
                                    class="me-2 fa-solid fa-arrow-left"></i>BACK</a>
                            <div class="col-6 bg-cover">
                                <div class="card shadow-sm">
                                    <div class="card-header mb-3 ">
                                        <h3>Order Info</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col">Customer Name</div>
                                            <div class="col">{{ strtoupper($orderList[0]->user_name) }}</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">Order Code</div>
                                            <div class="col text-primary">{{ $orderList[0]->order_code }}</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">Order Date</div>
                                            <div class="col">{{ $orderList[0]->created_at->format('F-j-Y') }}</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col"><h4>Total Price</h4>
                                                <small class="text-danger" style="font-size: 13px">Include Delivery charges</small>
                                            </div>
                                            <div class="col">{{ $order->total_price }}<small
                                                    class="btn btn-sm btn-success ms-2" style="font-size: 13px">MMK</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>

                                        <th>Product Image</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Product Name</th>
                                        <th>Order Date</th>
                                        <th>Qty</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody class=" mt-3" id="dataList">
                                    @foreach ($orderList as $item)
                                        <tr>
                                            <td class="col-2"><img src="{{ asset('storage/' . $item->product_image) }}"
                                                    class=" img-thumbnail"></td>
                                            <td>{{ $item->user_id }}</td>
                                            <td>{{ $item->user_name }}</td>
                                            <td>{{ $item->product_name }}</td>
                                            <td>{{ $item->created_at->format('F-j-Y') }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->total }}</td>


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>



                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

    </div>
@endsection
