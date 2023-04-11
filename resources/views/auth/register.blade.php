@extends('layouts.homepage-master')
@section('title','Register')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="signup-form">
                <!--sign up form-->
                <h2>New Customer Signup!</h2>
                <form action="{{route('register')}}" method="POST" role="form">
                    @csrf
                    <legend>Register</legend>


                    <label>Your information</label>

                    <input type="text" id="name" value="{{old('name')}}" name="name" class="form-control" placeholder="Name">
                    @if($errors->has('name'))
                    <p style="color:red;">
                        {{$errors->first('name')}}
                    </p>
                    @endif

                    <input type="text" id="address" value="{{old('address')}}" name="address" class="form-control" placeholder="Address">

                    @if($errors->has('address'))
                    <p style="color:red;">
                        {{$errors->first('address')}}
                    </p>
                    @endif

                    <input type="text" id="phone" value="{{old('phone')}}" name="phone" class="form-control" placeholder="Phone">

                    @if($errors->has('phone'))
                    <p style="color:red;">
                        {{$errors->first('phone')}}
                    </p>
                    @endif

                    <label>Account</label>

                    <input type="email" id="email" value="{{old('email')}}" name="email" class="form-control" placeholder="Email">
                    @if($errors->has('email'))
                    <p style="color:red;">
                        {{$errors->first('email')}}
                    </p>
                    @endif




                    <input type="password" id="pass" name="password" class="form-control" placeholder="Password">
                    @if($errors->has('password'))
                    <p style="color:red;">
                        {{$errors->first('password')}}
                    </p>
                    @endif

                    <input type="password" id="pass-confirm" name="password_confirmation" class="form-control" placeholder="Repeat Password">
                    @if($errors->has('password_confirmation'))
                    <p style="color:red;">
                        {{$errors->first('password_confirmation')}}
                    </p>
                    @endif


                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <!-- <form action="#">
                    <label>Your information</label>
                    <input type="text" name="name" placeholder="Name" />
                    <input type="text" name="address" placeholder="Address" />
                    <input type="text" name="phone" placeholder="Phone" />
                    <label>Account</label>
                    <input type="email" name="email" placeholder="Email Address" />
                    <input type="password" name="password" placeholder="Password" />
                    <input type="password" placeholder="Repeat Password" />
                    <button type="submit" class="btn btn-default">Signup</button>
                </form> -->
            </div>
            <!--/sign up form-->
        </div>
    </div>
</div>

@endsection
