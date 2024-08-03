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
                        <div class="container-fluid">
                            {{-- <div class="row">
                                <div class="col-3 offset-8">
                                    <a href="{{ route('category#list') }}"><button
                                            class="btn bg-dark text-white my-3">List</button></a>
                                </div>
                            </div> --}}

                            <div class="col-lg-10 offset-1">
                                <div class="row">
                                    @if (session('updateSuccess'))
                                        <div class="col-4 offset-8">
                                            <div class="alert alert-success alert-dismissible fade show " role="alert">
                                                <i class="fa-regular fa-circle-check fa-1x"></i>
                                                {{ session('updateSuccess') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="close"></button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="ms-5 ">
                                            <i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
                                        </div>


                                        <div class="row ">
                                            <div class="col-4 offset-1">
                                                <div class="image img-thumbnail shadow-sm">
                                                    <img src="{{ asset('storage/' . $pizza->image) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-6 offset-1 ">
                                                <div class=" au-btn--small btn bg-danger text-white">
                                                    <i class="fa-regular fa-note-sticky"></i>
                                                    {{ $pizza->name }}</span>
                                                </div>
                                                <span class=" my-2 btn au-btn--small bg-dark text-white"><i
                                                        class="fa-solid fa-dollar-sign"></i>
                                                    {{ $pizza->price }} kyats</span>
                                                </span>
                                                <span class=" my-2 btn au-btn--small bg-dark text-white"><i
                                                        class="fa-solid fa-clock"></i>
                                                    {{ $pizza->waiting_time }} mins</span>
                                                </span>
                                                <span class=" my-2 btn au-btn--small bg-dark text-white"><i
                                                        class="fa-solid fa-eye"></i>
                                                    {{ $pizza->view_count }}</span>
                                                </span>
                                                <span class=" my-2 btn au-btn--small bg-dark text-white"><i
                                                        class="fa-solid fa-coins"></i>
                                                    {{ $pizza->category_name }}</span>
                                                </span>
                                                <span class=" my-2 btn au-btn--small bg-dark text-white"><i
                                                        class="fa-solid fa-clock"></i>
                                                    {{ $pizza->created_at->format('j-F-Y') }}</span>
                                                </span>
                                                <div class=" my-2 fs-5"><i class="fa-solid fa-file-lines fs-6"></i> Details
                                                </div>
                                                <div>{{ $pizza->description }}</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

    </div>
@endsection
