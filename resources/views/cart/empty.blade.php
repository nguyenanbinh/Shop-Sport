@extends('layouts.homepage-master')
@section('title','Shopping Cart')
@section('content')

<div class="container">
    <h2>Cart Empty</h2>
    <div class="block-center">
        <img style="display: block; margin-left: auto; margin-right: auto;width:200px;height:300px" src="{{asset('images/empty-cart.jpg')}}" alt="">
    </div>
</div>

@endsection