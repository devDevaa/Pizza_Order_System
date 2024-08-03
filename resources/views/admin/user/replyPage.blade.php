@extends('admin.layouts.master')

@section('title', 'Reply to customer')

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
                                            <h3 class="text-center title-2">Reply To</h3>
                                        </div>
                                            <form action="" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-10 offset-1 ">
                                                        <div class="form-group">
                                                            <label class="control-label mb-1 bold">To</label>
                                                            <input id="cc-pament" name="accountName" type="text" disabled
                                                                class="au-input au-input--full"
                                                                value="{{ $replyMessage->name }}">
                                                        </div>
                                                    </div>
                                                    <div class=" col-10 offset-1">
                                                        <div class="form-group">
                                                            <label class="control-label mb-1 block bold">From Admin</label>
                                                            <textarea name="message" id="" cols="130" rows="10"  class="form-control" placeholder="Enter your message...."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2 ">
                                                        <a href="{{ route('customer#replyMessage') }}">
                                                            <button
                                                            class="btn bg-dark text-white rounded float-right  au-btn--small"
                                                            type="submit">
                                                            <i class="fa-solid fa-arrow-up-from-bracket me-2 "></i>Send
                                                        </button>
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
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

    </div>
@endsection
