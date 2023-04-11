@extends('admin.main')
@section('content')
<h1>Edit Order</h1>
<form action="{{route('admin.orders.update',$order->id)}}" method="post">
{{@csrf_field()}}
@method('PUT')
<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" value="{{$order->name}}" class="form-control">
</div>

<div class="form-group">
    <label>Address</label>
    <input type="text" name="address" value="{{$order->address}}" class="form-control">
</div>

<div class="form-group">
    <label>Phone</label>
    <input type="text" name="phone" value="{{$order->phone}}" class="form-control">
</div>

<div class="form-group">
    <label>Total</label>
    <input type="text" name="total" value="{{$order->total}}" class="form-control">
</div>

<div class="form-group">
    <label>Note</label>
</div>

<div class="form-group">
    <label>Status</label>
    <div class="form-group">
        <select name="status_id" id="">
        <option value="1">Pending</option>
        <option value="2">Approved</option>
        <option value="3">Canceled</option>
        <option value="4">Deleted</option>
        <option value="5">Done</option>
        </select>
    </div>

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
