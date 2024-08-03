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
                            <div class="col-lg-6 offset-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Change Password</h3>
                                        </div>
                                        @if (session('changePassword'))
                                            <div class="col-12">
                                                <div class="alert alert-success alert-dismissible fade show "
                                                    role="alert">
                                                    <i class="fa-regular fa-circle-check fa-1x"></i>
                                                    {{ session('changePassword') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="close"></button>
                                                </div>
                                            </div>
                                        @endif
                                        <hr>
                                        <form action="{{ route('user#changePassword') }}" method="post"
                                            novalidate="novalidate">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label mb-1">Old Password</label>
                                                <input id="cc-pament" name="oldPassword" type="password"
                                                    class="form-control @if (session('notMatch')) is-invalid @endif  @error('oldPassword')is-invalid @enderror"
                                                    aria-required="true" aria-invalid="false" placeholder="Old Password">
                                                @error('oldPassword')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                @if (session('notMatch'))
                                                    <div class="invalid-feedback">
                                                        {{ session('notMatch') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">New Password</label>
                                                <input id="cc-pament" name="newPassword" type="password"
                                                    class="form-control @error('newPassword')is-invalid @enderror"
                                                    aria-required="true" aria-invalid="false" placeholder="New Password">
                                                @error('newPassword')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Confirm Password</label>
                                                <input id="cc-pament" name="confirmPassword" type="password"
                                                    class="form-control @error('confirmPassword')is-invalid @enderror"
                                                    aria-required="true" aria-invalid="false"
                                                    placeholder="Confrim Password">
                                                @error('confirmPassword')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div>
                                                <button id="payment-button" type="submit"
                                                    class="btn btn-lg btn-info btn-block">
                                                    <small> <span id="payment-button-amount"><i
                                                                class="fa-solid fa-key me-2"></i>Change Password</span>
                                                    </small>
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
