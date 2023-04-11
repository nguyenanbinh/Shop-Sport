@extends('admin.main')
@section('content')
<h1>Create brand</h1>
<form action="{{route('admin.brands.store')}}" method="post" style="width: 80%;">

{{@csrf_field()}}


<div class="form-group">
    <label for="">Name<span style="color: red">(*)</span>:</label>
    <input type="text" name="name" id="" class="form-control">

    @if($errors->has('name'))
        <p style="color:red">{{$errors->first('name')}}</p>
        @endif
</div>


<input type="submit" id="createBtn" value="Create brand" class="btn btn-primary">
</form>
@endsection
@push('javascript')

   <script>
        $(document).ready(function() {
            var warn_on_unload = "";
            $('input:text,input:checkbox,input:radio,textarea,select').one('change', function() {
                warn_on_unload = "Leaving this page will cause any unsaved data to be lost.";

                $('#createBtn').click(function(e) {
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
@endpush
