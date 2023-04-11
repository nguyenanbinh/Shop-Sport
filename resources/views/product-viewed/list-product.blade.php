<div class="features_items">
    <h2 class="title text-center">Viewed items</h2>
    @foreach($products as $key=>$pro)

    <div class="col-sm-3" class="carousel-inner">
        <div class="product-image-wrapper">

            <div class="single-products">
                @if($pro['quantity'] == 0)
                <div class="productinfo text-center">
                    <a href="{{route('product-details',$pro['id'])}}" target="_blank" rel="noopener noreferrer">
                        <img src="  @foreach($pro->images as $key=>$image)  
                                                            @if($key ==0) 
                                                                {{$image['path']}} 
                                                            @endif
                                                            @endforeach" alt="" />
                    </a>
                    <a href="{{route('product-details',$pro['id'])}}" target="_blank" rel="noopener noreferrer">
                        <p>{{$pro['name']}} {{$pro->brand['name']}}</p>
                    </a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <p>Sản phẩm tạm thời hết hàng</p>
                    </div>
                </div>
                <!-- <img src="images/sold.jpg" class="sold-out" alt=""> -->
                @elseif($pro['sale_id'] != null )
                <div class="productinfo text-center">
                    <a href="{{route('product-details',$pro['id'])}}" target="_blank" rel="noopener noreferrer">
                        <img src="  @foreach($pro->images as $key=>$image)  
                                                            @if($key ==0) 
                                                                {{$image['path']}} 
                                                            @endif
                                                            @endforeach" alt="" />
                    </a>

                    @if($pro->sale['start_day'] <= now() && now() <=$pro->sale['end_day'])
                        <h4 style="text-decoration:line-through;">${{$pro['price']}}</h4>
                        <h2>${{ (1-$pro->sale->discount)*$pro['price'] }}</h2>
                        <a href="{{route('product-details',$pro['id'])}}" target="_blank" rel="noopener noreferrer">
                            <p>{{$pro['name']}} {{$pro->brand['name']}}</p>
                        </a>
                        <!-- <b href="#" data-id="{{$pro['id']}}" data-name="{{$pro['name']}}" data-price="{{(1-$pro->sale->discount)*$pro['price']}}" class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </b> -->
                        @else
                        <h2>${{$pro['price']}} </h2>
                        <a href="{{route('product-details',$pro['id'])}}" target="_blank" rel="noopener noreferrer">
                            <p>{{$pro['name']}} {{$pro->brand['name']}}</p>
                        </a>
                        <!-- <b href="#" data-id="{{$pro['id']}}" data-name="{{$pro['name']}}" data-price="{{$pro['price']}}" class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </b> -->
                        @endif

                </div>
                <!-- <div class="product-overlay">
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
                        </div> -->
                @if($pro->sale['start_day'] <= now() && now() <=$pro->sale['end_day'])
                    <img src="{{ asset('images/sale.png') }}" class="sale" alt="">
                    @endif
                    @else
                    <div class="productinfo text-center">
                    <a href="{{route('product-details',$pro['id'])}}" target="_blank" rel="noopener noreferrer">
                        <img src="  @foreach($pro->images as $key=>$image)  
                                                            @if($key ==0) 
                                                                {{$image['path']}} 
                                                            @endif
                                                            @endforeach" alt="" />
                    </a>

                        <h2>${{$pro['price']}} </h2>

                        <a href="{{route('product-details',$pro['id'])}}" target="_blank" rel="noopener noreferrer">
                            <p href="{{route('product-details',$pro['id'])}}">{{$pro['name']}} {{$pro->brand['name']}}</p>
                        </a>
                        <!-- <b href="#" data-id="{{$pro['id']}}" data-name="{{$pro['name']}}" data-price="{{$pro['price']}}" class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </b> -->
                    </div>
                    <!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                    <!-- <div class="product-overlay">
                                <div class="overlay-content">
                                    <a href="{{route('product-details',$pro['id'])}}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                    <b href="#" data-id="{{$pro['id']}}" data-name="{{$pro['name']}}" data-price="{{$pro['price']}}" class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </b>
                                </div>
                            </div> -->
                    @endif
                    @if ($pro['created_at'] >= now()->modify("-14 Days") && $pro['quantity'] != 0) <img src="{{ asset('images/new.png') }}" class="new" alt=""> @endif
            </div>
        </div>
    </div>

    @endforeach
</div>