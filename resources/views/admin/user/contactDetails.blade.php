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
                                            <h3 class="text-center title-2">Review Details</h3>
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
                                        <form action="{{route('customer#replyPage',$contactDetails->id) }}" method="GET">
                                        @csrf
                                        <div class="row">
                                            <div class="col-5 offset-1 ">
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Account Name</label>
                                                    <input id="cc-pament" name="accountName" type="text" disabled
                                                        class="au-input au-input--full"
                                                        value="{{ $contactDetails->account_name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Email</label>
                                                    <input id="cc-pament" name="accountName" type="text" disabled
                                                        class="au-input au-input--full"
                                                        value="{{ $contactDetails->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Address</label>
                                                    <input id="cc-pament" name="address" type="text" disabled
                                                        class="au-input au-input--full"
                                                        value="{{ $contactDetails->account_address }}">
                                                </div>
                                            </div>
                                            <div class="col-5 ">
                                                <div class="form-group">
                                                    <label class="control-label mb-1">User Name</label>
                                                    <input id="cc-pament" name="userName" type="text" disabled
                                                        class="au-input au-input--full"
                                                        value="{{ $contactDetails->name }}">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label mb-1">Phone</label>
                                                    <input id="cc-pament" name="phone" type="text" disabled
                                                        class="au-input au-input--full"
                                                        value="{{ $contactDetails->phone }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-1">Send Date</label>
                                                    <input id="cc-pament" name="sendDate" type="text" disabled
                                                        class="au-input au-input--full"
                                                        value="{{ $contactDetails->created_at->format('F-j-Y') }}">
                                                </div>

                                            </div>
                                            <div class=" col-10 offset-1">
                                                <div class="form-group">
                                                    <label class="control-label mb-1 block">Message</label>
                                                    <textarea name="message" id="" cols="130" rows="10" disabled class="form-control">{{ $contactDetails->message }}</textarea>
                                                </div>
                                            </div>
                                            {{-- <div class="mt-2">
                                                    <button
                                                    class="btn bg-dark text-white rounded float-right  au-btn--small"
                                                    type="submit">
                                                    <i class="fa-solid fa-arrow-up-from-bracket me-2 "></i>Reply
                                                </button>
                                            </div> --}}
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
