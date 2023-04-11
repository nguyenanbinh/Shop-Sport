@extends('layouts.homepage-master')
@section('title','News')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">News</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            @foreach($newss as $n)
                            <div class="item active">
                                <div class="product-image-wrapper">

                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div class="row">
                                                <div class="col-md-4"><a href="{{ route('show-news',$n->id) }}"><img src="@foreach($n->images as $key=>$image)  @if($key ==0) {{URL::to('/')}}/{{$image['path']}} @endif @endforeach"></a></div>
                                                <div class="col-md-8">
                                                    <h6>{{$n['title']}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                        </a> -->

                    </div>
                </div>
            </div>
            <div>
                <div class="col-sm-9">
                    <h2>{{ $news['title'] }}</h2>
                    <p>Created by : {{$user['name']}} at: {{$user['created_at']}}</p>
                    <img style="float: left; margin: 0 20px 20px 0; " src="@foreach($news->images as $key=>$image)  @if($key ==0) {{URL::to('/')}}/{{$image['path']}} @endif @endforeach" alt="">
                    <p style="text-align: justify; text-indent: 2em; ">{{ $news['content'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection