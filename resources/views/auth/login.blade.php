@extends('layouts.homepage-master')
@section('title','Login')
@section('content')


<!--form-->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="login-form">
                <!--login form-->
                <h2>Login to your account</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="email" name="email" value="{{old('email')}}" placeholder="Email Address" />
                    <input type="password" name="password" placeholder="Password" />
                    @if(session()->has('error'))
                    <p style="color:red;">{{session()->get('error')}}</p>
                    @endif
                    <span>
                        <input type="checkbox" class="checkbox">
                        Keep me signed in
                    </span>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
            </div>
            <!--/login form-->
        </div>
        <div class="col-md-1">
            <h2 class="or">Or</h2>
        </div>
        <div class="col-md-4 ">
            <button class="btn btn-danger" style="margin-top:80px"><a style="color:white;" href="{{route('register')}}"> Create Account</a></button>
        </div>
    </div>
</div>

@endsection
