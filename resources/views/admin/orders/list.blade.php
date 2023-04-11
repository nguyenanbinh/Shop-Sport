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
  @elseif(session('error'))
  <div class="alert alert-danger alert-dismissible" style="width:300px;float:right;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{session('error')}}</strong>
  </div>
@endif
 <h1>List Orders</h1>

    <table class="table table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Total</th>
                <th>Note</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>$ @php
                        $total =0;

                        foreach($order->products as $item){
                                $total+=$item->price * $item->pivot->quantity;
                        }
                        echo $total;

                    @endphp</td>
                    <td>{{ $order->note }}</td>
                    <td>
                        @if ($order->status_id == 1)
                    <a href="{{ route('admin.orders.active', $order->id) }}" class="badge badge-secondary">Pending</a>
                        @elseif($order->status_id ==2)
                            <p class="badge badge-primary">Approved</p>
                        @elseif($order->status_id ==3)
                            <p class="badge badge-warning">Canceled</p>
                        @elseif($order->status_id ==4)
                            <p class="badge badge-danger">Deleted</p>
                        @elseif($order->status_id ==5)
                            <p class="badge badge-success">Done</p>
                        @endif
                    <td>
                    <a href="{{ route('admin.orders.view') }}" data-id="{{$order->id}}" class="order_items btn btn-info">Info</a>
                    </td>
                    <td><a href="{{ route('admin.orders.edit',$order->id) }}">Edit</a></td>
                    <td>

                        <form action="{{ route('admin.orders.delete',$order->id  ) }}" method="post">
                            {{ @csrf_field() }}
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure to delete?')">
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div>
        {{ $orders->links('vendor.pagination.bootstrap-4') }}
    </div>
    <!-- The Modal -->
    <div class="modal" id="myModalOrder">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Order Detail Info #<b class="order_id"></b></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="content">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- js -->
 @push('javascript')
<script>
$(function () {
    $(".order_items").click(function(e) {
        e.preventDefault();
        let $this =$(this);
        let url = $this.attr('href');
        $("#content").html('');
        $(".order_id").text('').text($this.attr('data-id'));
        $("#myModalOrder").modal('show');

        console.log(url);

        $.ajax({
            url:url,

        }).done(function (result) {

            console.log(result);
            if(result){
                $("#content").html('').append(result);
            }

         });
    });
 });

</script>
<script>
    $(".alert-dismissible").fadeTo(1500, 100).slideUp(500, function(){
        $(".alert-dismissible").alert('close');
    });
     </script>
 @endpush

@endsection
