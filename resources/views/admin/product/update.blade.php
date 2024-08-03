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
                            <div class="row">
                                <div class="col-3 offset-8">

                                </div>
                            </div>
                            <div class="col-sm-10 offset-1">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title ">
                                            <i class="fa-solid fa-arrow-left offset-1" onclick="history.back()"></i>
                                            <h3 class="text-center title-2">Update Pizza</h3>
                                        </div>

                                        <form action="{{ route('product#update') }}" method="POST" class="mt-3"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-4 offset-1">
                                                    <input type="hidden" name="pizzaId" value="{{ $pizza->id }}">
                                                    <img src="{{ asset('storage/' . $pizza->image) }}" alt="">
                                                    <div class="mt-3">
                                                        <input type="file" name="pizzaImage"
                                                            class="au-input au-input--full  @error('pizzaImage') is-invalid @enderror">
                                                        @error('pizzaImage')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6 row">
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Name</label>
                                                        <input id="cc-pament" name="pizzaName" type="text"
                                                            class="au-input au-input--full @error('pizzaName') is-invalid @enderror"
                                                            value="{{ old('pizzaName', $pizza->name) }}"
                                                            aria-required="true" aria-invalid="false"
                                                            placeholder="Enter Admin Name">
                                                        @error('pizzaName')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Description</label>
                                                        <textarea name="pizzaDescription" class="au-input au-input--full @error('pizzaDescription') is-invalid @enderror"
                                                            cols="30" rows="5">{{ old('role', $pizza->description) }} </textarea>
                                                        @error('pizzaDescription')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <select name="pizzaCategory"
                                                            class="au-input au-input--full @error('pizzaCategory') is-invalid @enderror">
                                                            <option value="">Choose Category</option>
                                                            @foreach ($categories as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($pizza->category_id == $item->id) selected @endif>
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('pizzaCategory')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Price</label>
                                                        <input id="cc-pament" name="pizzaPrice" type="text"
                                                            class="au-input au-input--full @error('pizzaPrice') is-invalid @enderror"
                                                            value="{{ old('pizzaPrice', $pizza->price) }}"
                                                            aria-required="true" aria-invalid="false"
                                                            placeholder="Enter Admin Name">
                                                        @error('pizzaPrice')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Waiting Time</label>
                                                        <input id="cc-pament" name="waitingTime" type="text"
                                                            class="au-input au-input--full @error('waitingTime') is-invalid @enderror"
                                                            value="{{ old('waitingTime', $pizza->waiting_time) }}"
                                                            aria-required="true" aria-invalid="false"
                                                            placeholder="Enter Admin Name">
                                                        @error('waitingTime')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label mb-1">View Count</label>
                                                        <input id="cc-pament" name="viewCount" type="text"
                                                            class="au-input au-input--full"
                                                            value=" {{ old('viewCount', $pizza->view_count) }}"
                                                            aria-required="true" aria-invalid="false" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-1">Created Time</label>
                                                        <input id="cc-pament" name="created_at" type="text"
                                                            class="au-input au-input--full"
                                                            value=" {{ $pizza->created_at->format('j-F-Y') }}"
                                                            aria-required="true" aria-invalid="false" disabled>
                                                    </div>

                                                    <div class="mt-2 ">
                                                        <button
                                                            class="btn bg-dark text-white rounded float-right  au-btn--small"
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
