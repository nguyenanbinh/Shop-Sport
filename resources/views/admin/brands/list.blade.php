@extends('admin.main')

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible" style="width:500px;float:right;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{session('success')}}</strong>
  </div>
  @elseif(session('delete'))
  <div class="alert alert-success alert-dismissible" style="width:300px;float:right;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{session('delete')}}</strong>
  </div>
  @elseif(session('update'))
  <div class="alert alert-success alert-dismissible" style="width:300px;float:right;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{session('update')}}</strong>
  </div>
@endif
<h1>List Brand</h1>

<button type="button" class="btn btn-dark style="margin-bottom: 1em">
    <a href="{{route('admin.brands.create')}}">Add brand</a></button>
<table class="table table-bordered" style="width: 50%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach($brands as $brand)
        <tr>
            <td>{{$brand->id}}</td>
            <td>{{$brand->name}}</td>
            <td><a href="{{route('admin.brands.edit',$brand->id)}}"
            class="btn btn-dark"  role="button">Edit</a></td>
            <td>
                <form action="{{route('admin.brands.delete',$brand->id)}}" method="post">
                    {{@csrf_field()}}
                    @method('DELETE')
                    <input type="submit" id="delete" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure to delete?')">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div>
    {{$brands->links('vendor.pagination.bootstrap-4')}}
    </div>

@endsection

<!-- js -->
 @push('javascript')

 <script>
$(".alert-dismissible").fadeTo(1500, 100).slideUp(500, function(){
    $(".alert-dismissible").alert('close');
});
 </script>
 @endpush

