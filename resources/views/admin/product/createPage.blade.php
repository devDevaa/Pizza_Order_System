@extends('admin.layouts.master')

@section('title', 'Product List Page')

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
                                    <a href="{{ route('product#list') }}"><button
                                            class="btn bg-dark text-white my-3">List</button></a>
                                </div>
                            </div>
                            <div class="col-lg-6 offset-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create your Pizza</h3>
                                        </div>
                                        <hr>
                                        <form action="{{ route('product#create') }}" method="post" novalidate="novalidate"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label mb-1">Name</label>
                                                <input name="pizzaName" value="{{ old('pizzaName') }}" type="text"
                                                    class="au-input au-input--full @error('pizzaName') is-invalid @enderror"
                                                    aria-required="true" aria-invalid="false"
                                                    placeholder="Enter Pizza name">
                                                @error('pizzaName')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Category</label>
                                                <select name="pizzaCategory"
                                                    class="au-input au-input--full @error('pizzaCategory') is-invalid @enderror ">
                                                    <option value="">Choose category</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('pizzaCategory')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Description</label>
                                                    <textarea name="pizzaDescription" class="au-input au-input--full @error('pizzaDescription') is-invalid @enderror " cols="30"
                                                        rows="6" placeholder="Enter pizza description">{{ old('pizzaDescription') }}</textarea>
                                                    @error('pizzaDescription')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-1 d-block">Image</label>
                                                    <input type="file"
                                                        name="pizzaImage"class=" au-input au-input--full @error('pizzaImage') is-invalid @enderror">
                                                    @error('pizzaImage')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-1 d-block">Waiting Time</label>
                                                    <input type="integer"
                                                        name="waitingTime"class=" au-input au-input--full @error('waitingTime') is-invalid @enderror">
                                                    @error('waitingTime')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Price</label>
                                                    <input id="cc-pament" name="pizzaPrice" value="{{ old('pizzaPrice') }}"
                                                        type="text"
                                                        class="au-input au-input--full @error('pizzaPrice') is-invalid @enderror"
                                                        aria-required="true" aria-invalid="false"
                                                        placeholder="Enter pizza price">
                                                    @error('pizzaPrice')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>



                                                <div>
                                                    <button id="payment-button" type="submit"
                                                        class="btn btn-lg btn-info btn-block au-input">
                                                        <span id="payment-button-amount">Create</span>
                                                        <i class="fa-solid fa-circle-right"></i>
                                                    </button>
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
