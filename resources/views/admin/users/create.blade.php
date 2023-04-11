@extends('admin.main')
@section('content')
    <h1>Create user</h1>
    <form action="{{ route('admin.users.store') }}" method="post" style="width: 50%;">

        {{ @csrf_field() }}


        <div class="form-group">
            <label>Name <span style="color: red">(*)</span>:</label>
            <input type="text" name="name" id="" class="form-control">
            @if ($errors->has('name'))
                <p style="color:red">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Email <span style="color: red">(*)</span>:</label>
            <input type="email" name="email" id="" class="form-control">
            @if ($errors->has('email'))
                <p style="color:red">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Address <span style="color: red">(*)</span>:</label>
            <input type="text" name="address" id="" class="form-control">
            @if ($errors->has('address'))
                <p style="color:red">{{ $errors->first('address') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Phone <span style="color: red">(*)</span>:</label>
            <input type="text" name="phone" id="" class="form-control">
            @if ($errors->has('phone'))
                <p style="color:red">{{ $errors->first('phone') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Password <span style="color: red">(*)</span>:</label>
            <input type="text" name="password" id="" class="form-control">
            @if ($errors->has('phone'))
                <p style="color:red">{{ $errors->first('phone') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Role <span style="color: red">(*)</span>:</label>

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
        </div>

        </div>

        <input type="submit" id="createBtn" value="Create user" class="btn btn-primary">
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

        $('#createBtn').click(function(e) {
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
