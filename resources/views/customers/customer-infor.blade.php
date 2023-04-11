@extends('layouts.homepage-master')
@section('title','Sport Shop')
@section('content')


<section>
    <div class="container">
        <h2>Your Account Information</h2>
        <p>Welcome {{ Auth::user()->name }} </p>
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th rowspan="2">Day</th> -->
                            <th>Order Details</th>
                        </tr>
                        <tr>

                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)

                        <tr>
                            <td>{{ $order['created_at']->toFormattedDateString() }}</td>
                            @foreach($order->products as $key=>$pro)
                            <tr>
                                <td><a href="{{ route('product-details',$pro['id'])}}" target="_blank" rel="noopener noreferrer">{{ $pro['name'] }} {{$pro->brand['name']}} </a></td>
                                <td>{{$pro->pivot->quantity}} </td>
                                <td>{{$pro->pivot->price}} </td>
                            </tr>
                            @endforeach
                            <td>

                                </td>
                                <td></td>
                                <td>$
                                @php
                        $total =0;

                        foreach($order->products as $item){
                                $total+=$item->pivot->price;
                        }
                        echo $total;

                    @endphp
                                </td>
                                <td>
                                @if ($order->status_id == 1)
                                <p class="badge badge-secondary">Pending</p>
                                <a href="{{ route('orders-cancel', $order->id) }}" class="badge badge-secondary">Cancel</a>
                            @elseif($order->status_id ==2)
                                <p class="badge badge-primary">Approved</p>
                                <a href="{{ route('orders-done', $order->id) }}" class="badge badge-secondary">Received</a>
                            @elseif($order->status_id ==3)
                                <p class="badge badge-warning">Canceled</p>
                                <a href="{{ route('orders-delete', $order->id) }}" class="badge badge-secondary">Delete</a>
                            @elseif($order->status_id ==4)
                                <p class="badge badge-danger">Deleted</p>
                            @elseif($order->status_id ==5)
                                <p class="badge badge-success">Done</p>
                            @endif
                                </td>

                        </tr>

                        @endforeach

                        <!-- <tr>
                            <td>Jacob</td>
                        </tr>
                        <tr>
                            <td>Larry</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <h5>Your informantion</h5>
                <p> {{ Auth::user()->name }} </p>
                <p> {{ Auth::user()->email }} </p>
                <p> {{ Auth::user()->address }} </p>
                <p> {{ Auth::user()->phone }} </p>
                <a style="background: #FE980F;" class="btn btn-default" href="{{ route('account-edit',Auth::id()) }}">Edit your information</a>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{asset( '/js/cart.js' )}}"></script>
@endpush
