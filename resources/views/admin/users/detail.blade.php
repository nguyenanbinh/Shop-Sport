@extends('admin.main')
@section('content')
<table class="table table-bordered" style="width: 50%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            {{-- <th>Quantity</th>
            <th>Price</th>
            <th>Description</th>
            <th>Discount </th>
            <th>Image</th> --}}
        </tr>
    </thead>
    <tbody>
 
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        {{-- <td>{{$user->quantity}}</td>
        <td>{{$user->price}}</td>
        <td>{{$user->description}}</td>
        <td>{{$sale->discount}}%</td> --}}
        <td>###</td>



@endsection