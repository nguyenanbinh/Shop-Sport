@extends('admin.main')
@section('content')
<h1>Create sale</h1>
<form action="{{route('admin.sales.store')}}" method="post" style="width: 80%;">

{{@csrf_field()}}

<div class="form-group">
    <label for="">Title<span style="color: red">(*)</span>:</label>
    <input type="text" name="title" id="" class="form-control">
    @if($errors->has('namtitlee'))
        <p style="color:red">{{$errors->first('title')}}</p>
        @endif
</div>

<div class="form-group">
    <label for="">Content<span style="color: red">(*)</span>:</label>
    <input type="text" name="content" id="" class="form-control">
    @if($errors->has('content'))
        <p style="color:red">{{$errors->first('content')}}</p>
        @endif
</div>

<div class="form-group">
    <label for="">Discount<span style="color: red">(*)</span>:</label>
    <input type="text" name="discount" id="" class="form-control">
    @if($errors->has('discount'))
        <p style="color:red">{{$errors->first('discount')}}</p>
        @endif
</div>

<div class="form-group">
    <label for="">Start day<span style="color: red">(*)</span>:</label>
    <input type="text" name="start_day" id="" class="form-control">
    @if($errors->has('start_day'))
        <p style="color:red">{{$errors->first('start_day')}}</p>
        @endif
</div>

<div class="form-group">
    <label for="">End day<span style="color: red">(*)</span>:</label>
    <input type="text" name="end_day" id="" class="form-control">
    @if($errors->has('end_day'))
        <p style="color:red">{{$errors->first('end_day')}}</p>
        @endif
</div>


<input type="submit" id="createBtn" value="Create Sale" class="btn btn-primary">
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
