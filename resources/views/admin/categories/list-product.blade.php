@extends('admin.main')
@section('content')
<h1>List product of category :{{$category->name}}</h1>
<table class="table table-bordered" style="width: 50%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th colspan="2" style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (($category->products)!== null)
            
        
        @foreach($category->products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td><a href="#">{{$product->name}}</a></td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->price}}</td>
            <td><a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-dark" role="button">Edit</a></td>
           <td >
            <form action="{{route('admin.products.delete',$product->id)}}" method="post">
                {{@csrf_field()}}
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
            </td>
        </tr>
        @endforeach
        @else <h3>No products</h3>
        @endif
    </tbody>
</table>

@endsection