@extends('layouts.master')
@section('title', 'Register Page')

@section('content')
    <div class="login-form">
        <form action="{{ route('register') }}" method="post">
            @csrf
            @error('terms')
                <small class=" text-danger">{{ $message }}</small>
            @enderror

            <div class="form-group">
                <label>Username</label>
                <input class="au-input au-input--full" type="text" name="name" placeholder="Username" value="{{ old('name') }}">
                @error('name')
                    <small class=" text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Email Address</label>
                <input class="au-input au-input--full" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <small class=" text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Phone</label>
                <input class="au-input au-input--full" type="text" name="phone" placeholder="09xxxxxxxx" value="{{ old('phone') }}">
                @error('phone')
                    <small class=" text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="au-input au-input--full" value="{{ old('gender') }}">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input class="au-input au-input--full" type="text" name="address" placeholder="Address..." value="{{ old('address') }}">
                @error('address')
                    <small class=" text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Password</label>
                <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                @error('password')
                    <small class=" text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Password</label>
                <input class="au-input au-input--full" type="password" name="password_confirmation"
                    placeholder="Confirm Password">
                @error('password_confirmation')
                    <small class=" text-danger">{{ $message }}</small>
                @enderror
            </div>



            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>

        </form>
        <div class="register-link">
            <p>
                Already have account?
                <a href="{{ route('auth#loginPage') }}">Sign In</a>
            </p>
        </div>
    </div>
@endsection
