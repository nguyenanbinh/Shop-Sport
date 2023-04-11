@extends('admin.main')
@section('content')
<h1>Edit permission</h1>
<form action="{{route('admin.permissions.update',$permission->id)}}" method="post">
{{@csrf_field()}}
@method('PUT')
<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" value="{{$permission->name}}" class="form-control">

    <input type="submit" id="btnUpdate" value="Update" class="btn btn-dark">
</div>
</form>

@endsection
@push('javascript')
 <script>
     $(document).ready(function()
{
    var warn_on_unload="";
    $('input:text,input:checkbox,input:radio,textarea,select').one('change', function()
    {
        warn_on_unload = "Leaving this page will cause any unsaved data to be lost.";

        $('#btnUpdate').click(function(e) {
            warn_on_unload = "";});

            window.onbeforeunload = function() {
            if(warn_on_unload != ''){
                return warn_on_unload;
            }
        }
    });
});
    </script>

@endpush
