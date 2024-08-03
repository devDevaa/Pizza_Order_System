@extends('admin.layouts.master')

@section('title', 'Details')

@section('content')

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3 offset-8">
                                    <a href="{{ route('category#list') }}"><button
                                            class="btn bg-dark text-white my-3">List</button></a>
                                </div>
                            </div>

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
                                        <div class="card-title ">
                                            <h3 class="text-center title-2">Account Info</h3>
                                        </div>

                                        <div class="row ">

                                            {{-- Profile image --}}
                                            <div class="col-3 offset-2">
                                                <div class="image img-thumbnail">
                                                    @if (Auth::user()->image == null)
                                                        @if (Auth::user()->gender == 'male')
                                                            <img src="{{ asset('image/male_user.png') }}"
                                                                class=" img-thumbnail shadow-sm" alt="">
                                                        @else
                                                            <img src="{{ asset('image/female_user.png') }}"
                                                                class=" img-thumbnail shadow-sm" alt="">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                            class="shadow-sm overflow-y-hidden" />
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="col-5 offset-1 ">
                                                <form action="">
                                                    <div class="form-group">
                                                        <h4 class=" my-3"><i
                                                                class="fa-regular fa-user me-2"></i>{{ Auth::user()->name }}
                                                        </h4>
                                                        <h4 class=" my-3"><i
                                                                class="fa-regular fa-envelope me-2"></i>{{ Auth::user()->email }}
                                                        </h4>
                                                        <h4 class=" my-3"><i
                                                                class="fa-solid fa-phone me-2"></i>{{ Auth::user()->phone }}
                                                        </h4>
                                                        <h4 class=" my-3"><i
                                                                class="fa-solid fa-location-dot me-2"></i>{{ Auth::user()->address }}
                                                        </h4>
                                                        <h4 class=" my-3"><i
                                                                class="fa-regular fa-clock me-2"></i>{{ Auth::user()->created_at->format('j-F-Y') }}
                                                        </h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4 offset-6 mt-3">
                                                            <a href="{{ route('admin#edit') }}"
                                                                class="btn bg-dark text-white rounded">
                                                                <i class="fa-regular fa-pen-to-square me-2"></i>Edit
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
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
