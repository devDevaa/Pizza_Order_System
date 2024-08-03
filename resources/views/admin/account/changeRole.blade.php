@extends('admin.layouts.master')

@section('title', 'Change Role')

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
                                            class="btn bg-dark text-white my-3 rounded">List</button></a>
                                </div>
                            </div>
                            <div class="col-sm-10 offset-1">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="ms-5 ">
                                            {{-- <a href="{{ route('admin#list') }}">
                                                <i class="fa-solid fa-arrow-left"></i></a>
                                                <div class="ms-5 "> --}}
                                                    <button class=" btn btn-sm text-white btn-dark rounded"  onclick="history.back()"><i class="fa-solid fa-arrow-left" ></i> Back</button>
                                                </div>
                                        </div>

                                        <div class="card-title ">
                                            <h3 class="text-center title-2">Change Role</h3>
                                        </div>
                                        <form action="{{ route('admin#change', $account->id) }}" method="POST"
                                            class="mt-3" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-4 offset-1">
                                                    @if ($account->image == null)
                                                        @if ($account->gender == 'male')
                                                            <img src="{{ asset('image/male_user.png') }}"
                                                                class=" img-thumbnail shadow-sm" alt="">
                                                        @else
                                                            <img src="{{ asset('image/female_user.png') }}"
                                                                class=" img-thumbnail shadow-sm" alt="">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('storage/' . $account->image) }}"
                                                            class="shadow-sm" />
                                                    @endif

                                                </div>
                                                <div class="col-6 row">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Name</label>
                                                        <input id="cc-pament" disabled name="name" type="text"
                                                            class="au-input au-input--full @error('name') is-invalid @enderror"
                                                            value="{{ old('name', $account->name) }}" aria-required="true"
                                                            aria-invalid="false" placeholder="Enter Admin Name">
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Email</label>
                                                        <input id="cc-pament" disabled name="email" type="text"
                                                            class="au-input au-input--full @error('email') is-invalid @enderror"
                                                            value="{{ old('email', $account->email) }}" aria-required="true"
                                                            aria-invalid="false" placeholder="Enter Admin Email">
                                                        @error('email')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Address</label>
                                                        <textarea name="address" disabled class="au-input au-input--full @error('address') is-invalid @enderror" cols="30"
                                                            rows="7">{{ old('role', $account->address) }} </textarea>
                                                        @error('address')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Phone</label>
                                                        <input id="cc-pament" disabled name="phone" type="number"
                                                            class="au-input au-input--full @error('phone') is-invalid @enderror"
                                                            value="{{ old('address', $account->phone) }}"
                                                            aria-required="true" aria-invalid="false"
                                                            placeholder="Enter Admin Phone">
                                                        @error('phone')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select name="gender" disabled
                                                            class="au-input au-input--full @error('gender') is-invalid @enderror">
                                                            <option value="">Choose gender</option>
                                                            <option value="male"
                                                                @if ($account->gender == 'male') selected @endif>Male
                                                            </option>
                                                            <option value="female"
                                                                @if ($account->gender == 'female') selected @endif>Female
                                                            </option>
                                                        </select>
                                                        @error('gender')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Role</label>
                                                        <select name="role" class="au-input au-input--full">
                                                            <option value="admin"
                                                                @if ($account->role == 'admin') selected @endif>Admin
                                                            </option>
                                                            <option value="user"
                                                                @if ($account->role == 'user') selected @endif>User
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="my-2 ">
                                                        <button class="btn btn-sm bg-dark text-white rounded float-right "
                                                            type="submit">
                                                            <i class="fa-solid fa-arrow-up-from-bracket me-2 "></i>Change
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
