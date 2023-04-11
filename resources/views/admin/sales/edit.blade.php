@extends('admin.main')
@section('content')
<h1>Edit sale</h1>
<form action="{{route('admin.sales.update',$sale->id)}}" method="post">
{{@csrf_field()}}
@method('PUT')
<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" value="{{$sale->title}}" class="form-control">

    <label>Content</label>
    <input type="text" name="content" value="{{$sale->content}}" class="form-control">

    <label>Discount</label>
    <input type="text" name="discount" value="{{$sale->discount}}" class="form-control">

    <label>Start Day</label>
    <input type="text" name="start_day" value="{{$sale->start_day}}" class="form-control">

    <label>End day</label>
    <input type="text" name="end_day" value="{{$sale->end_day}}" class="form-control">

    <input type="submit" id="updateBtn" value="Update" class="btn btn-dark">
</div>
</form>

@endsection

@push('javascript')
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
@endpush
