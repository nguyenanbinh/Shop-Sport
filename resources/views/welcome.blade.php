@extends('layouts.homepage-master')
@section('title', 'Sport Shop')
@section('content')

    <section id="slider">
        <!--slider-->
        <!-- <div class="container"> -->
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($slides as $key => $s)
                        <div class="item {{ $key == 0 ? "active" : "" }}">
                            <img src="{{ $s->path }}" />
                        </div>
                @endforeach
            </div>
        </div>

        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
        </div>
        <!-- </div> -->
    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('layouts.sidebar')
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center"><a class="title-sale text-center"
                                href="{{ route('products-sale') }}">Sale Items</a></h2>

                        <p><a style="color:#FE980F" href="{{ route('products-sale') }}">Xem Thêm</a></p>

                        @foreach ($productsSale as $pro)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img style="width:250px; height:250px"
                                                src="@foreach ($pro->images as $key => $image)  @if ($key == 0) {{ $image['path'] }} @endif @endforeach"
                                                alt="" />
                                            <h4 style="text-decoration:line-through;">${{ $pro['price'] }}</h4>
                                            <h2 class="total">${{ (1 - $pro->sale->discount) * $pro['price'] }}</h2>
                                            <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}</p>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                    class="btn btn-default add-to-cart"><i></i>View Details</a>
                                                <b id="button" data-id="{{ $pro['id'] }}"
                                                    data-name="{{ $pro['name'] }}"
                                                    data-price="{{ (1 - $pro->sale->discount) * $pro['price'] }}"
                                                    class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</b>
                                            </div>
                                        </div>
                                        @if ($pro['created_at'] >= now()->modify('-14 Days'))
                                            <img src="images/new.png" class="new" alt="">
                                        @endif
                                        <img src="images/sale.png" class="sale" alt="">
                                    </div>
                                    {{-- <div class="choose">
											<ul class="nav nav-pills nav-justified">
												<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
												<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
											</ul>
										</div>  --}}
                                </div>
                            </div>
                        @endforeach


                        {{-- <div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/product2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/product3.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/product4.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
								<img src="images/home/new.png" class="new" alt="" />
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/product5.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
								<img src="images/home/sale.png" class="new" alt="" />
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="images/home/product6.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div> --}}

                        <!--features_items-->

                        <div class="category-tab">
                            <!--category-tab-->
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#kamito" data-toggle="tab">Giày Bóng Đá Kamito</a></li>
                                    <li><a href="#under" data-toggle="tab">Quần Áo Under Armour</a></li>
                                    <li><a href="#munike" data-toggle="tab">Mũ Nike</a></li>
                                    <li><a href="#baloadi" data-toggle="tab">Balo Adidas</a></li>
                                    <!-- <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li> -->
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="kamito">
                                    @foreach ($productsKamito as $pro)
                                        <div class="col-sm-3" class="carousel-inner">
                                            <div class="product-image-wrapper">

                                                <div class="single-products">
                                                    @if ($pro['quantity'] == 0)
                                                        <div class="productinfo text-center">
                                                            <a href="{{ route('product-details', $pro['id']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img src="  @foreach ($pro->images as $key => $image)
                                                            @if ($key == 0)
                                                                {{ $image['path'] }}
                                                            @endif @endforeach"
                                                                    alt="" />
                                                            </a>
                                                            <a href="{{ route('product-details', $pro['id']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}</p>
                                                            </a>
                                                        </div>
                                                        <div class="product-overlay">
                                                            <div class="overlay-content">
                                                                <p>Sản phẩm tạm thời hết hàng</p>
                                                            </div>
                                                        </div>
                                                        <!-- <img src="images/sold.jpg" class="sold-out" alt=""> -->
                                                    @elseif($pro['sale_id'] != null)
                                                        <div class="productinfo text-center">
                                                            <a href="{{ route('product-details', $pro['id']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img src="  @foreach ($pro->images as $key => $image)
                                                            @if ($key == 0)
                                                                {{ $image['path'] }}
                                                            @endif @endforeach"
                                                                    alt="" />
                                                            </a>

                                                            @if ($pro->sale['start_day'] <= now() && now() <= $pro->sale['end_day'])
                                                                <h4 style="text-decoration:line-through;">
                                                                    ${{ $pro['price'] }}</h4>
                                                                <h2>${{ (1 - $pro->sale->discount) * $pro['price'] }}</h2>
                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}</p>
                                                                </a>
                                                                <!-- <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ (1 - $pro->sale->discount) * $pro['price'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </b> -->
                                                            @else
                                                                <h2>${{ $pro['price'] }} </h2>
                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}</p>
                                                                </a>
                                                                <!-- <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </b> -->
                                                            @endif

                                                        </div>
                                                        <!-- <div class="product-overlay">
                                <div class="overlay-content">
                                    <a href="{{ route('product-details', $pro['id']) }}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                    @if ($pro->sale['start_day'] <= now() && now() <= $pro->sale['end_day'])
    <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ (1 - $pro->sale->discount) * $pro['price'] }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
@else
    <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
    @endif
                                </div>
                            </div> -->
                                                    @else
                                                        <div class="productinfo text-center">
                                                            <a href="{{ route('product-details', $pro['id']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img src="  @foreach ($pro->images as $key => $image)
                                                            @if ($key == 0)
                                                                {{ $image['path'] }}
                                                            @endif @endforeach"
                                                                    alt="" />
                                                            </a>

                                                            <h2>${{ $pro['price'] }} </h2>

                                                            <a href="{{ route('product-details', $pro['id']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <p href="{{ route('product-details', $pro['id']) }}">
                                                                    {{ $pro['name'] }} {{ $pro->brand['name'] }}</p>
                                                            </a>
                                                            <!-- <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </b> -->
                                                        </div>
                                                        <!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                                        <!-- <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="{{ route('product-details', $pro['id']) }}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                        <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
                                    </div>
                                </div> -->
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div>
           <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div>
           <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div> -->
                                </div>

                                <div class="tab-pane fade" id="under">
                                    @foreach ($productsUnd as $pro)
                                        <div class="col-sm-3" class="carousel-inner">
                                            <div class="product-image-wrapper">

                                                <div class="single-products">
                                                    @if ($pro['quantity'] == 0)
                                                        <div class="productinfo text-center">
                                                            <a href="{{ route('product-details', $pro['id']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img src="  @foreach ($pro->images as $key => $image)
                                                            @if ($key == 0)
                                                                {{ $image['path'] }}
                                                            @endif @endforeach"
                                                                    alt="" />
                                                            </a>
                                                            <a href="{{ route('product-details', $pro['id']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}</p>
                                                            </a>
                                                        </div>
                                                        <div class="product-overlay">
                                                            <div class="overlay-content">
                                                                <p>Sản phẩm tạm thời hết hàng</p>
                                                            </div>
                                                        </div>
                                                        <!-- <img src="images/sold.jpg" class="sold-out" alt=""> -->
                                                    @elseif($pro['sale_id'] != null)
                                                        <div class="productinfo text-center">
                                                            <a href="{{ route('product-details', $pro['id']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img src="  @foreach ($pro->images as $key => $image)
                                                            @if ($key == 0)
                                                                {{ $image['path'] }}
                                                            @endif @endforeach"
                                                                    alt="" />
                                                            </a>

                                                            @if ($pro->sale['start_day'] <= now() && now() <= $pro->sale['end_day'])
                                                                <h4 style="text-decoration:line-through;">
                                                                    ${{ $pro['price'] }}</h4>
                                                                <h2>${{ (1 - $pro->sale->discount) * $pro['price'] }}</h2>
                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}</p>
                                                                </a>
                                                                <!-- <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ (1 - $pro->sale->discount) * $pro['price'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </b> -->
                                                            @else
                                                                <h2>${{ $pro['price'] }} </h2>
                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}</p>
                                                                </a>
                                                                <!-- <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </b> -->
                                                            @endif

                                                        </div>
                                                        <!-- <div class="product-overlay">
                                <div class="overlay-content">
                                    <a href="{{ route('product-details', $pro['id']) }}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                    @if ($pro->sale['start_day'] <= now() && now() <= $pro->sale['end_day'])
    <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ (1 - $pro->sale->discount) * $pro['price'] }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
@else
    <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
    @endif
                                </div>
                            </div> -->
                                                    @else
                                                        <div class="productinfo text-center">
                                                            <a href="{{ route('product-details', $pro['id']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img src="  @foreach ($pro->images as $key => $image)
                                                            @if ($key == 0)
                                                                {{ $image['path'] }}
                                                            @endif @endforeach"
                                                                    alt="" />
                                                            </a>

                                                            <h2>${{ $pro['price'] }} </h2>

                                                            <a href="{{ route('product-details', $pro['id']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <p href="{{ route('product-details', $pro['id']) }}">
                                                                    {{ $pro['name'] }} {{ $pro->brand['name'] }}</p>
                                                            </a>
                                                            <!-- <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </b> -->
                                                        </div>
                                                        <!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                                        <!-- <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="{{ route('product-details', $pro['id']) }}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                        <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
                                    </div>
                                </div> -->
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div>
           <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div>
           <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div> -->
                                </div>

                                <div class="tab-pane fade" id="munike">
                                    <div class="col-sm-3">
                                        @foreach ($productsNike as $pro)
                                            <div class="col-sm-3" class="carousel-inner">
                                                <div class="product-image-wrapper">

                                                    <div class="single-products">
                                                        @if ($pro['quantity'] == 0)
                                                            <div class="productinfo text-center">
                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <img src="  @foreach ($pro->images as $key => $image)
                                                            @if ($key == 0)
                                                                {{ $image['path'] }}
                                                            @endif @endforeach"
                                                                        alt="" />
                                                                </a>
                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}</p>
                                                                </a>
                                                            </div>
                                                            <div class="product-overlay">
                                                                <div class="overlay-content">
                                                                    <p>Sản phẩm tạm thời hết hàng</p>
                                                                </div>
                                                            </div>
                                                            <!-- <img src="images/sold.jpg" class="sold-out" alt=""> -->
                                                        @elseif($pro['sale_id'] != null)
                                                            <div class="productinfo text-center">
                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <img src="  @foreach ($pro->images as $key => $image)
                                                            @if ($key == 0)
                                                                {{ $image['path'] }}
                                                            @endif @endforeach"
                                                                        alt="" />
                                                                </a>

                                                                @if ($pro->sale['start_day'] <= now() && now() <= $pro->sale['end_day'])
                                                                    <h4 style="text-decoration:line-through;">
                                                                        ${{ $pro['price'] }}</h4>
                                                                    <h2>${{ (1 - $pro->sale->discount) * $pro['price'] }}</h2>
                                                                    <a href="{{ route('product-details', $pro['id']) }}"
                                                                        target="_blank" rel="noopener noreferrer">
                                                                        <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}
                                                                        </p>
                                                                    </a>
                                                                    <!-- <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ (1 - $pro->sale->discount) * $pro['price'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </b> -->
                                                                @else
                                                                    <h2>${{ $pro['price'] }} </h2>
                                                                    <a href="{{ route('product-details', $pro['id']) }}"
                                                                        target="_blank" rel="noopener noreferrer">
                                                                        <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}
                                                                        </p>
                                                                    </a>
                                                                    <!-- <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </b> -->
                                                                @endif

                                                            </div>
                                                            <!-- <div class="product-overlay">
                                <div class="overlay-content">
                                    <a href="{{ route('product-details', $pro['id']) }}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                    @if ($pro->sale['start_day'] <= now() && now() <= $pro->sale['end_day'])
    <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ (1 - $pro->sale->discount) * $pro['price'] }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
@else
    <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
    @endif
                                </div>
                            </div> -->
                                                        @else
                                                            <div class="productinfo text-center">
                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <img src="  @foreach ($pro->images as $key => $image)
                                                            @if ($key == 0)
                                                                {{ $image['path'] }}
                                                            @endif @endforeach"
                                                                        alt="" />
                                                                </a>

                                                                <h2>${{ $pro['price'] }} </h2>

                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <p href="{{ route('product-details', $pro['id']) }}">
                                                                        {{ $pro['name'] }} {{ $pro->brand['name'] }}
                                                                    </p>
                                                                </a>
                                                                <!-- <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </b> -->
                                                            </div>
                                                            <!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                                            <!-- <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="{{ route('product-details', $pro['id']) }}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                        <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
                                    </div>
                                </div> -->
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div>
           <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div>
           <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="i" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div> -->
                                </div>

                                <div class="tab-pane fade" id="baloadi">
                                    <div class="col-sm-3">
                                        @foreach ($productsAdidas as $pro)
                                            <div class="col-sm-3" class="carousel-inner">
                                                <div class="product-image-wrapper">

                                                    <div class="single-products">
                                                        @if ($pro['quantity'] == 0)
                                                            <div class="productinfo text-center">
                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <img src="  @foreach ($pro->images as $key => $image)
                                                            @if ($key == 0)
                                                                {{ $image['path'] }}
                                                            @endif @endforeach"
                                                                        alt="" />
                                                                </a>
                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}</p>
                                                                </a>
                                                            </div>
                                                            <div class="product-overlay">
                                                                <div class="overlay-content">
                                                                    <p>Sản phẩm tạm thời hết hàng</p>
                                                                </div>
                                                            </div>
                                                            <!-- <img src="images/sold.jpg" class="sold-out" alt=""> -->
                                                        @elseif($pro['sale_id'] != null)
                                                            <div class="productinfo text-center">
                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <img src="  @foreach ($pro->images as $key => $image)
                                                            @if ($key == 0)
                                                                {{ $image['path'] }}
                                                            @endif @endforeach"
                                                                        alt="" />
                                                                </a>

                                                                @if ($pro->sale['start_day'] <= now() && now() <= $pro->sale['end_day'])
                                                                    <h4 style="text-decoration:line-through;">
                                                                        ${{ $pro['price'] }}</h4>
                                                                    <h2>${{ (1 - $pro->sale->discount) * $pro['price'] }}</h2>
                                                                    <a href="{{ route('product-details', $pro['id']) }}"
                                                                        target="_blank" rel="noopener noreferrer">
                                                                        <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}
                                                                        </p>
                                                                    </a>
                                                                    <!-- <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ (1 - $pro->sale->discount) * $pro['price'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </b> -->
                                                                @else
                                                                    <h2>${{ $pro['price'] }} </h2>
                                                                    <a href="{{ route('product-details', $pro['id']) }}"
                                                                        target="_blank" rel="noopener noreferrer">
                                                                        <p>{{ $pro['name'] }} {{ $pro->brand['name'] }}
                                                                        </p>
                                                                    </a>
                                                                    <!-- <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </b> -->
                                                                @endif

                                                            </div>
                                                            <!-- <div class="product-overlay">
                                <div class="overlay-content">
                                    <a href="{{ route('product-details', $pro['id']) }}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                    @if ($pro->sale['start_day'] <= now() && now() <= $pro->sale['end_day'])
    <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ (1 - $pro->sale->discount) * $pro['price'] }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
@else
    <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
    @endif
                                </div>
                            </div> -->
                                                        @else
                                                            <div class="productinfo text-center">
                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <img src="  @foreach ($pro->images as $key => $image)
                                                            @if ($key == 0)
                                                                {{ $image['path'] }}
                                                            @endif @endforeach"
                                                                        alt="" />
                                                                </a>

                                                                <h2>${{ $pro['price'] }} </h2>

                                                                <a href="{{ route('product-details', $pro['id']) }}"
                                                                    target="_blank" rel="noopener noreferrer">
                                                                    <p href="{{ route('product-details', $pro['id']) }}">
                                                                        {{ $pro['name'] }} {{ $pro->brand['name'] }}
                                                                    </p>
                                                                </a>
                                                                <!-- <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </b> -->
                                                            </div>
                                                            <!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                                            <!-- <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="{{ route('product-details', $pro['id']) }}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                                        <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </b>
                                    </div>
                                </div> -->
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div>
           <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div>
           <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div> -->
                                </div>

                                <!-- <div class="tab-pane fade" id="poloshirt">
           <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div>
           <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div>
           <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div>
           <div class="col-sm-3">
            <div class="product-image-wrapper">
             <div class="single-products">
              <div class="productinfo text-center">
               <img src="" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>

             </div>
            </div>
           </div>
          </div> -->
                            </div>
                        </div>
                        <!--/category-tab-->
                        <div id="product-viewed">

                        </div>

                        @if (Auth::check())
                            @if (!empty($proRecommend))
                                <div class="recommended_items">
                                    <!--recommended_items-->
                                    <h2 class="title text-center">recommended items</h2>

                                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                @foreach ($proRecommend as $pro)
                                                    <div class="col-sm-4">
                                                        <div class="product-image-wrapper">
                                                            <div class="single-products">
                                                                @if ($pro['sale_id'] != null)
                                                                    <div class="productinfo text-center">
                                                                        <a href="{{ route('product-details', $pro['id']) }}"
                                                                            target="_blank" rel="noopener noreferrer"><img
                                                                                style="width:250px; height:250px"
                                                                                src="  @foreach ($pro->images as $key => $image)
																		@if ($key == 0)
																			{{ $image['path'] }}
																		@endif @endforeach"
                                                                                alt="" /></a>

                                                                        @if ($pro->sale['start_day'] <= now() && now() <= $pro->sale['end_day'])
                                                                            <h4 style="text-decoration:line-through;">
                                                                                ${{ $pro['price'] }}</h4>
                                                                            <h2>${{ (1 - $pro->sale->discount) * $pro['price'] }}
                                                                            </h2>
                                                                            <a href="{{ route('product-details', $pro['id']) }}"
                                                                                target="_blank" rel="noopener noreferrer">
                                                                                <p>{{ $pro['name'] }}
                                                                                    {{ $pro->brand['name'] }}</p>
                                                                            </a>
                                                                            <b href="#"
                                                                                data-id="{{ $pro['id'] }}"
                                                                                data-name="{{ $pro['name'] }}"
                                                                                data-price="{{ (1 - $pro->sale->discount) * $pro['price'] }}"
                                                                                class="btn btn-default add-to-cart">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                                Add to cart
                                                                            </b>
                                                                        @else
                                                                            <h2>${{ $pro['price'] }} </h2>
                                                                            <a href="{{ route('product-details', $pro['id']) }}"
                                                                                target="_blank" rel="noopener noreferrer">
                                                                                <p>{{ $pro['name'] }}
                                                                                    {{ $pro->brand['name'] }}</p>
                                                                            </a>
                                                                            <b href="#"
                                                                                data-id="{{ $pro['id'] }}"
                                                                                data-name="{{ $pro['name'] }}"
                                                                                data-price="{{ $pro['price'] }}"
                                                                                class="btn btn-default add-to-cart">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                                Add to cart
                                                                            </b>
                                                                        @endif

                                                                    </div>
                                                                    <!-- <div class="product-overlay">
                  <div class="overlay-content">
                   <a href="{{ route('product-details', $pro['id']) }}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                   @if ($pro->sale['start_day'] <= now() && now() <= $pro->sale['end_day'])
    <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ (1 - $pro->sale->discount) * $pro['price'] }}" class="btn btn-default add-to-cart">
                     <i class="fa fa-shopping-cart"></i>
                     Add to cart
                    </b>
@else
    <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                     <i class="fa fa-shopping-cart"></i>
                     Add to cart
                    </b>
    @endif
                  </div>
                 </div>
                 -->
                                                                    @if ($pro->sale['start_day'] <= now() && now() <= $pro->sale['end_day'])
                                                                        <img src="{{ asset('images/sale.png') }}"
                                                                            class="sale" alt="">
                                                                    @endif
                                                                @else
                                                                    <div class="productinfo text-center">
                                                                        <a href="{{ route('product-details', $pro['id']) }}"
                                                                            target="_blank" rel="noopener noreferrer"><img
                                                                                style="width:250px; height:250px"
                                                                                src="  @foreach ($pro->images as $key => $image)
																		@if ($key == 0)
																			{{ $image['path'] }}
																		@endif @endforeach"
                                                                                alt="" /></a>

                                                                        <h2>${{ $pro['price'] }} </h2>

                                                                        <a href="{{ route('product-details', $pro['id']) }}"
                                                                            target="_blank" rel="noopener noreferrer">
                                                                            <p>{{ $pro['name'] }}
                                                                                {{ $pro->brand['name'] }}</p>
                                                                        </a>
                                                                        <b href="#" data-id="{{ $pro['id'] }}"
                                                                            data-name="{{ $pro['name'] }}"
                                                                            data-price="{{ $pro['price'] }}"
                                                                            class="btn btn-default add-to-cart">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                            Add to cart
                                                                        </b>
                                                                    </div>
                                                                    <!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                                                    <!-- <div class="product-overlay">
                   <div class="overlay-content">
                    <a href="{{ route('product-details', $pro['id']) }}" class="btn btn-default add-to-cart"><i></i>View Details</a>
                    <b href="#" data-id="{{ $pro['id'] }}" data-name="{{ $pro['name'] }}" data-price="{{ $pro['price'] }}" class="btn btn-default add-to-cart">
                     <i class="fa fa-shopping-cart"></i>
                     Add to cart
                    </b>
                   </div>
                  </div> -->
                                                                @endif
                                                                @if ($pro['created_at'] >= now()->modify('-14 Days') && $pro['quantity'] != 0)
                                                                    <img src="{{ asset('images/new.png') }}"
                                                                        class="new" alt="">
                                                                @endif

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-sm-4">
               <div class="product-image-wrapper">
                <div class="single-products">
                 <div class="productinfo text-center">
                  <img src="" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                 </div>

                </div>
               </div>
              </div>
              <div class="col-sm-4">
               <div class="product-image-wrapper">
                <div class="single-products">
                 <div class="productinfo text-center">
                  <img src="" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                 </div>

                </div>
               </div>
              </div> -->
                                                @endforeach
                                            </div>
                                            <!-- <div class="item">
              <div class="col-sm-4">
               <div class="product-image-wrapper">
                <div class="single-products">
                 <div class="productinfo text-center">
                  <img src="" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                 </div>

                </div>
               </div>
              </div>
             </div>
            </div>
            <div class="col-sm-4">
             <div class="product-image-wrapper">
              <div class="single-products">
               <div class="productinfo text-center">
                <img src="" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
               </div>
              </div>
             </div>
            </div>
            <div class="col-sm-4">
             <div class="product-image-wrapper">
              <div class="single-products">
               <div class="productinfo text-center">
                <img src="" alt="" />
                <h2>$56</h2>
                <p>Easy Polo Black Edition</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
               </div>
              </div>
             </div> -->
                                        </div>
                                        <!-- <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
             <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
             <i class="fa fa-angle-right"></i>
            </a> -->
                                    </div>
                                </div>
                                <!--/recommended_items-->
                            @endif
                        @endif

                    </div>
                </div>
            </div>
    </section>
    @push('javascript')
        <script type="text/javascript" src="{{ asset('/js/cart.js') }}"></script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let routeProduct = "{{ route('product-viewed') }}";

                let products = localStorage.getItem('products');
                products = $.parseJSON(products);
                if (products.length > 0) {
                    $.ajax({
                        url: routeProduct,
                        method: "POST",
                        data: {
                            id: products
                        },
                        success: function(result) {
                            // console.log(result);
                            $('#product-viewed').html('').append(result.data);
                        }
                    });
                }
            });
        </script>
    @endpush

@endsection
