@extends('user.layouts.master')

@section('content')


            <!-- Contact Start -->
    <div class="container-fluid">


        <div class="row px-xl-5">
            <div class="col-lg-7 offset-3 mb-5">
                <div class=" text-dark my-3 btn">
                    <i class="fa-solid fa-arrow-left" onclick="history.back()"></i> back
                </div>
                <h2 class="section-title position-relative text-uppercase  mb-4  "><span class="bg-secondary pr-3">Contact Us</span></h2>
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate" action="{{ route('contact#sendMessage') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ Auth::user()->id }}" name="userId">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name" name="name"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email" name="email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="8" id="message" placeholder="Message" name="message"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>

    </div>
    <!-- Contact End -->

@endsection
@section('scriptSource')
    <script>
        $(document).ready(function() {


        });
    </script>
@endsection
