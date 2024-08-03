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

                            <div class="table-data__tool-right">
                                <a href="{{ route('category#createPage') }}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>add item
                                    </button>
                                </a>
                                {{-- <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    CSV download
                                </button> --}}
                            </div>
                        </div>

                        {{-- temporary session message --}}
                        @if (session('deleteSuccess'))
                            <div class="col-4 offset-8">
                                <div class="alert alert-warning alert-dismissible fade show " role="alert">
                                    <i class="fa-regular fa-circle-check fa-1x"></i> {{ session('deleteSuccess') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="close"></button>
                                </div>
                            </div>
                        @endif

                        {{-- Data Searching --}}
                        <div class="row">
                            <div class="col-3">
                                <h3>searching for: <span class="text-danger"> {{ request('key') }} </span></h3>
                            </div>
                            <div class=" offset-6 col-3 mb-4">
                                <form class=" form-header " action="{{ route('category#list') }}" method="GET">
                                    @csrf
                                    <input class="au-input au-input--sm" type="text" name="key"
                                        placeholder="Search for data.." value="{{ request('key') }}" />
                                    <button class="au-btn--submit bg-dark" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- data table --}}
                        @if (count($categories) != 0)
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Caategory Name</th>
                                            <th>Created Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class=" mt-3">
                                        @foreach ($categories as $category)
                                            <tr class="tr-shadow ">
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->created_at->format('j-F-Y') }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('category#edit', $category->id) }}">
                                                            <button class="item bg-warning ml-2" data-toggle="tooltip"
                                                                data-placement="top" title="Edit">
                                                                <i class="zmdi zmdi-edit text-white"></i>
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('category#delete', $category->id) }}">
                                                            <button class="item bg-danger ml-2" data-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete text-white"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                 <!-- Pagination -->
                                <div class=" mt-3">
                                    {{-- {{ $categories->links() }} --}}
                                    {{ $categories->appends(request()->query())->links() }}
                                </div>
                            </div>
                        @else
                            <h3 class=" text-secondary text-center mt-5">Ooop! There is no Category Here!!</h3>
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
