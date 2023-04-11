@extends('layouts.homepage-master')
@section('title','Product Details')
@section('content')

<section style="opacity:10;">
    <div id="content-product" data-id="{{$product['id']}}">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('layouts.sidebar')
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img id="img" src="@foreach($product->images as $key=>$image) @if($key ==0) {{$image['path']}} @endif @endforeach" alt="" />
                                <!-- <h3>ZOOM</h3> -->
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->

                                <div class="carousel-inner">

                                    <div class="item active">
                                        @foreach($product->images as $key=>$image)
                                        @if($key < 3) <a href="#"> <img src="{{$image['path']}}" alt="" onclick="changeImage('{{$image->path}}');"> </a>
                                            @endif
                                            @endforeach

                                    </div>

                                    <!--<div class="item">
                                    <a href=""><img src="{{$image['path']}}" alt=""></a>
                                    <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                </div> -->
                                    <!--<div class="item active">

                                    <a href=""><img src="{{ asset('images/puma1.jpg') }}" alt=""></a>
                                    <a href=""><img src="{{ asset('images/puma2.jpg') }}" alt=""></a>

                                </div> -->

                                </div>


                                <!-- Controls -->
                                <!-- <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a> -->

                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <!--/product-information-->
                                @if ($product['created_at'] >= now()->modify("-14 Days")) <img src="/images/new.jpg" class="newarrival" alt="" /> @endif
                                <h2>{{$product['name']}}</h2>
                                <span>
                                    @if($product['sale_id'] != null)
                                    @if($product->sale['start_day'] <= now() && now() <=$product->sale['end_day'])
                                        <h4 style="text-decoration:line-through;">${{$product['price']}}</h4>
                                        <span>${{ (1-$product->sale->discount)*$product['price'] }}</span>
                                        <b data-id="{{$product['id']}}" data-name="{{$product['name']}}" data-price="{{(1-$product->sale->discount)*$product['price']}}" type="button" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
                                        @else
                                        <span>US ${{$product['price']}}</span>
                                        <b data-id="{{$product['id']}}" data-name="{{$product['name']}}" data-price="{{$product['price']}}" type="button" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
                                        @endif
                                        @else
                                        <span>US ${{$product['price']}}</span>
                                        <b data-id="{{$product['id']}}" data-name="{{$product['name']}}" data-price="{{$product['price']}}" type="button" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
                                        @endif
                                </span>
                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                <label>Quantity: {{$product['quantity']}}</label>
                                <p><b>Brand:</b> {{$product->brand['name']}}</p>
                                <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
                            </div>
                            <!--/product-information-->
                        </div>
                    </div>
                    <!--/product-details-->

                    <div class="category-tab shop-details-tab">
                        <!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <!-- <li><a href="#details" data-toggle="tab">Details</a></li> -->
                                <!-- <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li> -->
                                <li><a href="#tag" data-toggle="tab">Tag</a></li>
                                <li class="active"><a href="#reviews" data-toggle="tab">Reviews ({{$product->feedbacks->count()}})</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- <div class="tab-pane fade" id="details">

                            </div> -->
                            <div class="tab-pane fade" id="tag">
                                @foreach($productByCate as $pro)
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
                            <div class="tab-pane fade active in" id="reviews">
                                <div class="col-sm-12">
                                    @if(Auth::check())
                                    @foreach($feedbacks as $f)
                                    @if($product['id'] == $f['product_id'])
                                    @if(Auth::id() == $f->user_id)
                                    <div class="row">
                                        <div class="col-md-9">
                                            <ul>
                                                <li><a href=""><i class="fa fa-user"></i>{{$f->user['name']}}</a></li>
                                                <li><a href=""><i class="fa fa-clock-o"></i>{{$f->user['created_at']->toTimeString()}}</a></li>
                                                <li><a href=""><i class="fa fa-calendar-o"></i>{{$f->user['created_at']->toFormattedDateString()}}</a></li>
                                            </ul>
                                            <p>{{$f['content']}}</p>
                                        </div>
                                        <div class="col-md-3">


                                            <div class="dropdown pull-left">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    ...
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a href="{{route('feedback-edit',['proID' =>$f['product_id'],'id' => $f['id']])}}" class="active"><i class="fa"></i> Edit</a></li>
                                                    <li>
                                                        <form method="POST" action="{{route('feedback-delete',['proID' =>$f['product_id'],'id' => $f['id']])}}">

                                                            @csrf
                                                            @method('DELETE')

                                                            <div class="form-group">
                                                                <input type="submit" class="fa" value="Delete">
                                                            </div>
                                                        </form>
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>{{$f->user['name']}}</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>{{$f->user['created_at']->toTimeString()}}</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>{{$f->user['created_at']->toFormattedDateString()}}</a></li>
                                    </ul>
                                    <p>{{$f['content']}}</p>
                                    @endif
                                    @endif
                                    @endforeach
                                    <p><b>Write Your Review</b></p>

                                    <form action="{{route('feedback-update',['proID' =>$f['product_id'],'id' => $f['id']])}}" method="POST" role="form" id="edit-feedback">

                                        @csrf
                                        @method('PUT')

                                        <legend>Edit Review</legend>

                                        <textarea form="edit-feedback" name="content"></textarea>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>

                                    <!-- <form action="{{ route('feedbacks') }}" method="POST" id="feedbacks">
                                        @csrf
                                        <span>
                                            <input type="hidden" name="user_id" value="{{Auth::id()}}" />
                                            <input type="hidden" name="product_id" value="{{$product['id']}}" />
                                        </span>
                                        <textarea form="feedbacks" name="content"></textarea>
                                        <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                                        <button type="submit" class="btn btn-default pull-right">
                                            Submit
                                        </button>
                                    </form> -->
                                    @else
                                    @foreach($feedbacks as $f)
                                    @if($product['id'] == $f['product_id'])
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>{{$f->user['name']}}</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>{{$f->user['created_at']->toTimeString()}}</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>{{$f->user['created_at']->toFormattedDateString()}}</a></li>
                                    </ul>
                                    <p>{{$f['content']}}</p>
                                    @endif
                                    @endforeach
                                    <a type="button" class="btn btn-danger" href="{{route('login')}}">Login member to write your review</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/category-tab-->
                    <!-- <div class="recommended_items">
                    <!--recommended_items
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!--/recommended_items

                </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('javascript')
<script type="text/javascript">
    function changeImage(a) {
        $("#img").attr('src', a);
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        // luu id san pham vao storage
        let productID = $("#content-product").attr('data-id');
        console.log(productID);
        // lay gia tri storage
        let products = localStorage.getItem('products');

        if (products == null) {
            productAr = new Array();
            productAr.push(productID);
            localStorage.setItem('products', JSON.stringify(productAr));
        } else {
            // chuyen ve mang
            products = $.parseJSON(products);
            if (products.indexOf(productID) == -1) {
                products.push(productID);
                localStorage.setItem('products', JSON.stringify(products));
            }
            console.log(products)
        }
    })
</script>
<script type="text/javascript" src="{{asset( '/js/cart.js' )}}"></script>

@endpush
