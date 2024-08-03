@extends('user.layouts.master')

@section('content')


    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="container-fluid">

                            <div class="col-sm-10 offset-1">
                                @if (session('updateSuccess'))
                                    <div class="col-4 offset-8">
                                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                                            <i class="fa-regular fa-circle-check fa-1x"></i> {{ session('updateSuccess') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="close"></button>
                                        </div>
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title ">
                                            <h3 class="text-center title-2">Profile</h3>
                                        </div>
                                        <form action="{{ route('account#update', Auth::user()->id) }}" method="POST"
                                            class="mt-3" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-4 offset-1">
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
                                                            class="shadow-sm img-thumbnail" />
                                                    @endif
                                                    <div class="mt-3">
                                                        <input type="file" name="image"
                                                            class=" form-control  @error('image') is-invalid @enderror">
                                                        @error('image')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 row">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1 d-block">Name</label>
                                                        <input id="cc-pament" name="name" type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            value="{{ old('name', Auth::user()->name) }}"
                                                            aria-required="true" aria-invalid="false"
                                                            placeholder="Enter Admin Name">
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-1 d-block">Email</label>
                                                        <input id="cc-pament" name="email" type="text"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            value="{{ old('email', Auth::user()->email) }}"
                                                            aria-required="true" aria-invalid="false"
                                                            placeholder="Enter Admin Email">
                                                        @error('email')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-1 d-block">Address</label>
                                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="7">{{ old('role', Auth::user()->address) }} </textarea>
                                                        @error('address')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-1 d-block">Phone</label>
                                                        <input id="cc-pament" name="phone" type="number"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            value="{{ old('address', Auth::user()->phone) }}"
                                                            aria-required="true" aria-invalid="false"
                                                            placeholder="Enter Admin Phone">
                                                        @error('phone')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="d-block">Gender</label>
                                                        <select name="gender"
                                                            class="form-control @error('gender') is-invalid @enderror">
                                                            <option value="">Choose gender</option>
                                                            <option value="male"
                                                                @if (Auth::user()->gender == 'male') selected @endif>Male
                                                            </option>
                                                            <option value="female"
                                                                @if (Auth::user()->gender == 'female') selected @endif>Female
                                                            </option>
                                                        </select>
                                                        @error('gender')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-1 d-block">Role</label>
                                                        <input id="cc-pament" name="role" type="text"
                                                            class="form-control"
                                                            value=" {{ old('role', Auth::user()->role) }}"
                                                            aria-required="true" aria-invalid="false" disabled>
                                                    </div>
                                                    <div class="mt-2 ">
                                                        <button class="btn bg-dark text-white rounded float-right "
                                                            type="submit">
                                                            <i class="fa-solid fa-arrow-up-from-bracket me-2 "></i>Update
                                                        </button>
                                                    </div>
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
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

    </div>


@endsection
