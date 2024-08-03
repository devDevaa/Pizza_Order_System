@extends('admin.layouts.master')
@section('title', 'Order List Page')

@section('content')

    <!-- PAGE CONTAINER-->
    <div class="page-container">


        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Order List</h2>

                                </div>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="{{ route('product#createPage') }}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>add Pizza
                                    </button>
                                </a>
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    CSV download
                                </button>
                            </div>
                        </div>

                        @if (session('deleteSuccess'))
                            <div class="col-4 offset-8">
                                <div class="alert alert-warning alert-dismissible fade show " role="alert">
                                    <i class="fa-regular fa-circle-check fa-1x"></i> {{ session('deleteSuccess') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="close"></button>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-3">
                                <h3>Search Key: <span class="text-danger"> {{ request('key') }} </span></h3>
                            </div>
                            <div class=" col-3 offset-6  mb-4">
                                <form action="{{ route('order#list') }}" method="GET">
                                    @csrf
                                    <div class="d-flex">
                                        <input class="au-input au-input--sm" type="text" name="key"
                                            placeholder="Enter order code.." value="{{ request('key') }}" />
                                        <button class="au-btn--submit bg-dark" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>


                        <form action="{{ route('order#changeStatus') }}" method="get">
                            @csrf
                            <div class=" form-group">
                                <label for="" class="me-4 d-inline-block">Status</label>
                                <select name="orderStatus" class="col-2 d-inline-block text-center ">
                                    <option value="">All</option>
                                    <option value="0" @if (request('orderStatus') == '0')
                                        selected
                                    @endif>Pending</option>
                                    <option value="1"@if (request('orderStatus') == '1')
                                        selected
                                    @endif>Accept</option>
                                    <option value="2"@if (request('orderStatus') == '2')
                                        selected
                                    @endif>Reject</option>
                                </select>
                                <button type="submit" class="btn btn-sm bg-dark text-white d-inline-block">Search</button>
                            </div>
                        </form>

                        @if (count($orders) != 0)
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2 text-center">
                                    <thead>
                                        <tr>

                                            <th>User ID</th>
                                            <th>Name</th>
                                            <th>Order Date</th>
                                            <th>Order Code</th>
                                            <th>Amount</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class=" mt-3" id="dataList">
                                        @foreach ($orders as $item)
                                            <tr>
                                                <input type="hidden" class="orderId" value="{{ $item->id }}">
                                                <td>{{ $item->user_id }}</td>
                                                <td>{{ $item->user_name }}</td>
                                                <td>{{ $item->created_at->format('F-j-Y') }}</td>
                                                <td><a href="{{ route('order#listInfo',$item->order_code) }}" class=" text-decoration-none">{{ $item->order_code }}</a></td>
                                                <td>{{ $item->total_price }}</td>
                                                <td>{{ $item->user_phone }}</td>
                                                <td>
                                                    <select name="status" class=" au-input au-input--full text-center statusChange">
                                                        <option value="0"
                                                            @if ($item->status == 0) selected @endif>Pending
                                                        </option>
                                                        <option value="1"
                                                            @if ($item->status == 1) selected @endif>Accept
                                                        </option>
                                                        <option value="2"
                                                            @if ($item->status == 2) selected @endif>Reject
                                                        </option>
                                                    </select>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{-- <div class=" mt-3">
                                    {{ $orders->appends(request()->query())->links() }}
                                </div> --}}
                            </div>
                        @else
                            <h3 class=" text-secondary text-center mt-5">Ooop! Nothing Here!!</h3>
                        @endif


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
@section('scriptSource')
    <script>
        $(document).ready(function() {
            // $('#orderStatus').change(function(e) {
            //     $status = $('#orderStatus').val();

            //     $.ajax({
            //         type: 'get',
            //         url: 'http://localhost:8000/order/ajax/status',
            //         data: {
            //             'status': $status
            //         },
            //         dataType: 'json',
            //         success: function(response) {
            //             $list = ``;
            //             for ($i = 0; $i < response.length; $i++) {

            //                 $months =['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'Novenber', 'December'];
            //                 $dbDate = new Date(response[$i].created_at);
            //                 $finalDate =$months[$dbDate.getMonth()] +"-"+$dbDate.getDate() +"-"+ $dbDate.getFullYear();

            //                 if(response[$i].status ==0){
            //                     $statusMessage =`
            //                             <select name="status" class=" au-input au-input--full text-center statusChange">
            //                                 <option value="0" selected>Pending
            //                                 </option>
            //                                 <option value="1">Accept
            //                                 </option>
            //                                 <option value="2">Reject
            //                                 </option>
            //                             </select>`;
            //                 }else if(response[$i].status ==1){
            //                     $statusMessage =`
            //                             <select name="status" class=" au-input au-input--full text-center statusChange">
            //                                 <option value="0">Pending
            //                                 </option>
            //                                 <option value="1" selected>Accept
            //                                 </option>
            //                                 <option value="2">Reject
            //                                 </option>
            //                             </select>`;
            //                 }else if(response[$i].status ==2){
            //                     $statusMessage =`
            //                             <select name="status" class=" au-input au-input--full text-center statusChange">
            //                                 <option value="0">Pending
            //                                 </option>
            //                                 <option value="1">Accept
            //                                 </option>
            //                                 <option value="2" selected>Reject
            //                                 </option>
            //                             </select>`;
            //                 }
            //                 $list +=
            //                     `<tr>
            //                         <input type="hidden" class="orderId" value="${response[$i].id }}">
            //                         <td>${response[$i].user_id }</td>
            //                         <td>${response[$i].user_name }</td>
            //                         <td>${$finalDate}</td>
            //                         <td>${response[$i].order_code }</td>
            //                         <td>${response[$i].total_price }</td>
            //                         <td>${response[$i].user_phone }</td>
            //                         <td>
            //                             ${$statusMessage}
            //                         </td>
            //                     </tr>`;
            //             }
            //             $('#dataList').html($list);
            //         }
            //     })
            // });

            // change Status
            $('.statusChange').change(function () {
                $currentStatus = $(this).val();

                $parentNode = $(this).parents('tr');

                $orderId = $parentNode.find('.orderId').val();

                $data = {
                    'status' :$currentStatus,
                    'orderId' : $orderId
                }

                $.ajax({
                    type :'get',
                    url:'http://localhost:8000/order/ajax/change/status',
                    data:$data,
                    dataType: 'json',

                })
                location.reload();
            })

        });
    </script>

@endsection
