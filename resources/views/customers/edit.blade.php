@extends('layouts.homepage-master')
@section('title', 'Sport Shop')
@section('content')

    <div class="container">
        <form action="{{ route('account-update', $customer->id) }}" method="POST" role="form">

            @csrf
            @method('PUT')

            <legend>Edit Your Account</legend>

            <div class="form-group">
                <label for="">Name: </label>
                <input type="text" name="name" class="form-control" value="{{ $customer->name }}"
                    placeholder="Input Name">
            </div>
            @if ($errors->has('name'))
                <p style="color:red;">
                    {{ $errors->first('name') }}
                </p>
            @endif

            <div class="form-group">
                <label for="">Address: </label>
                <input type="text" name="address" class="form-control" value="{{ $customer->address }}"
                    placeholder="Input Name">
            </div>
            @if ($errors->has('address'))
                <p style="color:red;">
                    {{ $errors->first('address') }}
                </p>
            @endif

            <div class="form-group">
                <label for="">Phone: </label>
                <input type="tel" name="phone" class="form-control" value="{{ $customer->phone }}"
                    placeholder="Input Name">
            </div>
            @if ($errors->has('phone'))
                <p style="color:red;">
                    {{ $errors->first('phone') }}
                </p>
            @endif

            <div class="form-group">
                <label for="">Email: </label>
                <input type="text" name="email" class="form-control" value="{{ $customer->email }}"
                    placeholder="Input Email" disabled>
            </div>
            @if ($errors->has('email'))
                <p style="color:red;">
                    {{ $errors->first('email') }}
                </p>
            @endif
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script type="text/javascript" src="{{ asset('/js/cart.js') }}"></script>
@endpush
