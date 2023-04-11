@extends('layouts.homepage-master')
@section('title','Sport Shop || Products by Brand')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">{{ $brand['name'] }}</h2>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Khoảng giá</label>
                                </div>
                                <div class="col-md-9">
                                    <br> <br>
                                    <a class="{{ Request::get('price') == 1 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 1]) }}"> Dưới $ 100 </a>
                                    <a class="{{ Request::get('price') == 2 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 2]) }}"> $100- $300 </a>
                                    <a class="{{ Request::get('price') == 3 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 3]) }}"> $300 - $500 </a>
                                    <a class="{{ Request::get('price') == 4 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 4]) }}"> $500 - $700 </a>
                                    <a class="{{ Request::get('price') == 5 ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['price' => 5]) }}"> $700 - $900 </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-bottom: 20px;">
                            <form id="form_filter" method="get">
                                <div class="orderby-wrapper ">
                                    <label> Sắp xếp</label>
                                    <select name="orderby" class="orderby">
                                        <option {{ Request::get('orderby') == "md" ? "selected='selected'" :"" }} value="md" selected="selected">Mặc định</option>
                                        <option {{ Request::get('orderby') == "desc" ? "selected='selected'" :"" }} value="desc">Mới nhất</option>
                                        <option {{ Request::get('orderby') == "asc" ? "selected='selected'" :"" }} value="asc">Sản phẩm cũ</option>
                                        <option {{ Request::get('orderby') == "price_max" ? "selected='selected'" :"" }} value="price_max">Giá tăng dần</option>
                                        <option {{ Request::get('orderby') == "price_min" ? "selected='selected'" :"" }} value="price_min">Giá giảm dần</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    @foreach($products as $pro)
                    <div class="col-sm-4">

                        <div class="product-image-wrapper">

                            <div class="single-products">
                                @if($pro['quantity'] == 0)
                                <div class="productinfo text-center">
                                    <img style="width:250px; height:250px" src="  @foreach($pro->images as $key=>$image)
                                                    @if($key ==0)
                                                        {{$image['path']}}
                                                    @endif
                                                    @endforeach" alt="" />
                                    <p>{{$pro['name']}} {{$pro->brand['name']}}</p>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <p>Sản phẩm tạm thời hết hàng</p>
                                    </div>
                                </div>
                                <!-- <img src="images/sold.jpg" class="sold-out" alt=""> -->
                                @elseif($pro['sale_id'] != null )
                                <div class="productinfo text-center">
                                    <img style="width:250px; height:250px" src="  @foreach($pro->images as $key=>$image)
                                                    @if($key ==0)
                                                        {{$image['path']}}
                                                    @endif
                                                    @endforeach" alt="" />

                                    @if($pro->sale['start_day'] <= now() && now() <=$pro->sale['end_day'])
                                        <h4 style="text-decoration:line-through;">${{$pro['price']}}</h4>
                                        <h2>${{ (1-$pro->sale->discount)*$pro['price'] }}</h2>
                                        @else
                                        <h2>${{$pro['price']}} </h2>
                                        @endif
                                        <p>{{$pro['name']}} {{$pro->brand['name']}}</p>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="{{route('product-details',$pro['id'])}}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                        @if($pro->sale['start_day'] <= now() && now() <=$pro->sale['end_day'])
                                            <b href="#" data-id="{{$pro['id']}}" data-name="{{$pro['name']}}" data-price="{{(1-$pro->sale->discount)*$pro['price']}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </b>
                                            @else
                                            <b href="#" data-id="{{$pro['id']}}" data-name="{{$pro['name']}}" data-price="{{$pro['price']}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </b>
                                            @endif
                                    </div>
                                </div>
                                @if($pro->sale['start_day'] <= now() && now() <=$pro->sale['end_day'])
                                    <img src="{{ asset('images/sale.png') }}" class="sale" alt="">
                                    @endif
                                    @else
                                    <div class="productinfo text-center">
                                        <img style="width:250px; height:250px" src="  @foreach($pro->images as $key=>$image)
                                                    @if($key ==0)
                                                        {{$image['path']}}
                                                    @endif
                                                    @endforeach" alt="" />

                                        <h2>${{$pro['price']}} </h2>

                                        <p>{{$pro['name']}} {{$pro->brand['name']}}</p>
                                    </div>
                                    <!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <a href="{{route('product-details',$pro['id'])}}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                            <b href="#" data-id="{{$pro['id']}}" data-name="{{$pro['name']}}" data-price="{{$pro['price']}}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </b>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($pro['created_at'] >= now()->modify("-14 Days") && $pro['quantity'] != 0) <img src="{{ asset('images/new.png') }}" class="new" alt=""> @endif
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
                <p>Có {{$products->total()}} sản phẩm</p>
                {{ $products->links('vendor.pagination.bootstrap-4')  }}
                <!-- <ul class="pagination">
                    <li class="active"><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">&raquo;</a></li>
                </ul> -->
                <!--features_items-->
            </div>
        </div>
    </div>
</section>

@endsection

@push('javascript')
<script type="text/javascript" src="{{asset( '/js/cart.js' )}}"></script>
<script>
    $(function() {
        $('.orderby').change(function() {
            $("#form_filter").submit();
        })
    })
</script>
@endpush
