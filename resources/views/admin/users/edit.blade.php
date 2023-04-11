@extends('admin.main')
@section('content')
<h1>Edit user</h1>
<form action="{{route('admin.users.update',$user->id)}}" method="post">
{{@csrf_field()}}
@method('PUT')
<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" value="{{$user->name}}" class="form-control">

    <label>Email</label>
    <input type="text" name="email" value="{{$user->email}}" class="form-control">

    <label>Address</label>
    <input type="text" name="address" value="{{$user->address}}" class="form-control">

    <label>Phone</label>
    <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
<br>
@if (Auth::user()
->getRoleNames()
->contains('admin'))
    <select name="role">
        @foreach ($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
    </select>
@else
    <select name="role">
        @foreach ($roles as $role)
            @if ($role->name != 'admin')
                <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endif
        @endforeach
    </select>
@endif
<br>
<br>
    <input type="submit" id="updateBtn" value="Update" class="btn btn-dark">
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

        $('#updateBtn').click(function(e) {
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
