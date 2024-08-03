@extends('admin.layouts.master')

@section('title', 'Category List Page')

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
                                    <h2 class="title-1">Product List</h2>

                                </div>
                            </div>
                            {{-- CREATE PIZZA --}}
                            <div class="table-data__tool-right">
                                <a href="{{ route('product#createPage') }}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>add Pizza
                                    </button>
                                </a>
                                {{-- <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    CSV download
                                </button> --}}
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

                        {{-- search function --}}
                        <div class="row">
                            <div class="col-3">
                                <h3>Search Key: <span class="text-danger"> {{ request('key') }} </span></h3>
                            </div>
                            <div class=" col-3 offset-6  mb-4">
                                <form action="{{ route('product#list') }}" method="GET">
                                    @csrf
                                    <div class="d-flex">
                                        <input class="au-input au-input--sm" type="text" name="key"
                                            placeholder="Search for data.." value="{{ request('key') }}" />
                                        <button class="au-btn--submit bg-dark" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if (count($pizzas) != 0)
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2 text-center">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>View Count</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class=" mt-3">
                                        @foreach ($pizzas as $item)
                                            <tr class="tr-shadow ">
                                                <td class="col-2"><img src="{{ asset('storage/' . $item->image) }}"
                                                        class=" img-thumbnail shadow-sm" alt=""></td>
                                                <td class="col-3">{{ $item->name }}</td>
                                                <td class="col-2">{{ $item->price }}</td>
                                                <td class="col-2">{{ $item->category_name }}</td>
                                                <td class="col-2"><i class="fa-solid fa-eye"></i> {{ $item->view_count +1}}
                                                </td>
                                                <td class="col-2">
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('product#edit', $item->id) }}">
                                                            <button class="item bg-primary ml-2 " data-toggle="tooltip"
                                                                data-placement="top" title="View">
                                                                <i class="fa-solid fa-eye text-white"></i>
                                                            </button></a>
                                                        <a href="{{ route('product#updatePage', $item->id) }}">
                                                            <button class="item bg-warning ml-2" data-toggle="tooltip"
                                                                data-placement="top" title="Edit">
                                                                <i class="zmdi zmdi-edit text-white"></i>
                                                            </button></a>
                                                        <a href="{{ route('product#delete', $item->id) }}">
                                                            <button class="item bg-danger ml-2" data-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete text-white"></i>
                                                            </button></a>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                 <!-- PAGINATION with search -->
                                <div class=" mt-3">
                                    {{ $pizzas->appends(request()->query())->links() }}
                                </div>
                            </div>
                        @else
                            <h3 class=" text-secondary text-center mt-5">Ooop! There is no Pizza Here!!</h3>
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
