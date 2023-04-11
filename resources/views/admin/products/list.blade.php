@extends('admin.main')
@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible" style="width:500px;float:right;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{session('success')}}</strong>
  </div>
  @elseif(session('delete'))
  <div class="alert alert-danger alert-dismissible" style="width:300px;float:right;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{session('delete')}}</strong>
  </div>
  @elseif(session('update'))
  <div class="alert alert-success alert-dismissible" style="width:300px;float:right;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{session('update')}}</strong>
  </div>
  @elseif(session('warning'))
  <div class="alert alert-warning alert-dismissible" style="width:300px;float:right;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{session('warning')}}</strong>
  </div>
@endif
<h1>List product </h1>
<div class="flex-center position-ref full-height">
    <div class="content">
    <form class="typeahead" action="{{route('admin.products.search')}}" role="search" method="POST">
        @csrf
            <input type="search" name="q" class="form-control search-input" placeholder="Type something..."
                autocomplete="off">
                <button type="submit">Search</button>
        </form>
    </div>
</div>
<button type="button" class="btn btn-light" style="margin: 1em 0"><a href="{{route('admin.products.create')}}">Add Product</a></button>
<table class="table table-bordered" style="width: 90%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image</th>
            <th colspan="2" style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
    <tr>
        <td>{{$product->id}}</td>
        <td><a href="{{route('admin.products.detail',$product->id)}}">
        {{$product->name}}
        </a></td>
        <td>{{$product->category->name}}</td>
        <td>{{$product->quantity}}</td>
        <td>${{$product->price}}</td>
        <td><div >
                @foreach($product->images as $key=>$img)
                @if($key ===0)
                 <img style=" height: 80px;width: 80px;"
                    src="{{$img->path}}" alt="">
                    @endif
                    @endforeach
           </div>
        </td>
        <td><a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-dark" role="button">Edit</a></td>
        <td>
            <form action="{{route('admin.products.delete',$product->id)}}" method="post">
                {{@csrf_field()}}
                @method('DELETE')
                <input type="submit" id ="delete" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure to delete?')">
            </form>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>

{{ $products->links('vendor.pagination.bootstrap-4') }}

@endsection

@push('javascript')

<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/bloodhound.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"></script>
    <script>
        $(document).ready(function($) {
            var engine1 = new Bloodhound({
                remote: {
                    url: '/admin/search/products/name?value=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });



            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, [{
                    source: engine1.ttAdapter(),
                    name: 'name',

                    display: function(data) {
                        return data.name;
                    },
                    templates: {
                        empty: [
                            '<div class="header-title">Name</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                        ],
                        header: [
                            '<div class="header-title">Name</div><div class="list-group search-results-dropdown"></div>'
                        ],
                        suggestion: function(data) {
                            return '<a href="/admin/products/' + data.id + '" class="list-group-item">' +
                                data.name + '</a>';
                        }
                    }

                }
            ]);
        });

    </script>
 <script>
    $(document).ready(function() {
        var warn_on_unload = "";
        $('input:text,input:checkbox,input:radio,textarea,select').one('change', function() {
            warn_on_unload = "Leaving this page will cause any unsaved data to be lost.";

            $('#updateBtn').click(function(e) {
                warn_on_unload = "";
            });

            window.onbeforeunload = function() {
                if (warn_on_unload != '') {
                    return warn_on_unload;
                }
            }
        });
    });
</script>

<script>
$(".alert-dismissible").fadeTo(1500, 100).slideUp(500, function(){
    $(".alert-dismissible").alert('close');
});
 </script>

 @endpush
