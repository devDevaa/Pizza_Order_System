@extends('user.layouts.master')

@section('content')
    <!-- Breadcrumb Start -->
    {{-- <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div> --}}
    <!-- Breadcrumb End -->
    <!-- Shop Sidebar Start -->
    <div class="col-lg-3 col-md-4">
        <!-- Price Start -->
        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter
                by price</span></h5>
        <div class="bg-light p-4 mb-30">
            <form>
                <div class="d-flex align-items-center justify-content-between mb-3 bg-gray-100 shadow-sm">
                    <label class="" for="price-all">Categories</label>
                    <span class="badge border font-weight-norma text-dark">{{ count($category) }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{ route('user#homePage') }}" class=" text-dark"><label class=""
                            for="price-all">All</label></a>
                </div>
                @foreach ($category as $item)
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="{{ route('user#filter', $item->id) }}" class=" text-dark">
                            <label class="" for="price-all">{{ $item->name }}</label></a>
                    </div>
                @endforeach

            </form>
        </div>
        <!-- Price End -->


        <div class="">
            <button class="btn btn btn-warning w-100 rounded">Order</button>
        </div>

    </div>
    <!-- Shop Sidebar End -->
    <!-- Shop Product Start -->
    <div class="col-lg-9 col-md-8">
        <div class="row pb-3">
            <div class="col-12 pb-1">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <a href="{{ route('user#cartList') }}">

                            <button type="button" class="btn btn-dark text-white position-relative rounded">
                                <i class="fa fa-shopping-cart"></i>
                                <span
                                    class=" position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ count($cart) }}
                                </span>
                            </button>

                        </a>
                        <a href="{{ route('user#history') }}">
                            <button type="button" class="btn btn-dark text-white position-relative rounded ms-2">
                                <i class="fa-solid fa-clock-rotate-left me-2"></i>History
                                <span
                                    class=" position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ count($history) }}
                                </span>
                            </button>
                        </a>
                    </div>

                    {{-- ordering the products --}}
                    <div class="row ">
                        <div class="btn-group ">
                            <div>
                                <select name="sorting" id="sortingOption" class=" form-control btn btn-dark rounded">
                                    <option value="">Choose Option</option>
                                    <option value="asc">Ascending</option>
                                    <option value="desc">Descending</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                @if (session('success'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        <i class="fa-regular fa-circle-check fa-1x"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                </div>
            @endif
            </div>

            <span class="row" id="dataList">
                @if (count($pizza) != 0)
                    @foreach ($pizza as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4" id="myForm">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" style="height: 210px"
                                        src="{{ asset('storage/' . $item->image) }}" alt="">

                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href="">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                        <a class="btn btn-outline-dark btn-square"
                                            href="{{ route('user#pizzaDetails', $item->id) }}">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="">{{ $item->name }}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>{{ $item->price }} kyats</h5>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @else
                    <p class="text-center shadow fs-4 col-6 offset-3 py-5">
                        There is no Pizza
                        <i class="fa-solid fa-pizza-slice ms-3"></i>
                    </p>
                @endif
            </span>

        </div>
    </div>
    <!-- Shop Product End -->
    </div>
    </div>

    <!-- Shop End -->
@endsection

@section('scriptSource')
    <script>
        $(document).ready(function() {
            // $.ajax({
            //     type: 'get',
            //     url: 'http://localhost:8000/user/ajax/pizza/list',
            //     dataType: 'json',
            //     success: function(response) {
            //         console.log(response)
            //     }
            // })

            $('#sortingOption').change(function() {
                $eventOption = $('#sortingOption').val();

                if ($eventOption == 'asc') {
                    $.ajax({
                        type: 'get',
                        url: 'http://localhost:8000/user/ajax/pizza/list',
                        data: {
                            'status': 'asc'
                        },
                        dataType: 'json',
                        success: function(response) {
                            $list = '';
                            for ($i = 0; $i < response.length; $i++) {
                                $list += `
                                <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4" id="myForm">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" style="height: 210px" src="{{ asset('storage/${response[$i].image}') }}"
                                                alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i
                                                        class="fa-solid fa-circle-info"></i></a>

                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name}</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>${response[$i].price} kyats</h5>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mb-1">
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                            }
                            $('#dataList').html($list);
                        }
                    })
                } else if ($eventOption == 'desc') {
                    $.ajax({
                        type: 'get',
                        url: 'http://localhost:8000/user/ajax/pizza/list',
                        data: {
                            'status': 'desc'
                        },
                        dataType: 'json',
                        success: function(response) {
                            $list = '';
                            for ($i = 0; $i < response.length; $i++) {
                                $list += `
                                <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4" id="myForm">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" style="height: 210px" src="{{ asset('storage/${response[$i].image}') }}"
                                                alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href=""><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i
                                                        class="fa-solid fa-circle-info"></i></a>

                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name}</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>${response[$i].price} kyats</h5>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mb-1">
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                            }
                            $('#dataList').html($list);
                        }
                    })
                }
            })
        });
    </script>
@endsection
