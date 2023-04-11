@extends('admin.main')
@section('content')
<table class="table table-bordered" style="width: 70%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Description</th>
            <th>Discount </th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
 
    <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->category->name}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->description}}</td>
        @if(isset($product->sale))
        <td>{{$product->sale->discount*100}}%</td>
        @else
        <td>No dsicount</td>
         @endif
         <td><div >         
            @foreach($product->images as $key=>$img)
            @if($key ===0)
             <img style=" height: 80px;width: 80px;" 
                src="{{$img->path}}" alt="">           
                @endif
                @endforeach            
       </div>




@endsection