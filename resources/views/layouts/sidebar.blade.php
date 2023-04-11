<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian">
        <!--category-products-->
        @foreach ($categories as $cate)
            @if ($cate['parent_id'] == 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#{{ $cate['tag'] }}">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                {{ $cate['name'] }}
                            </a>
                        </h4>
                    </div>

                    <div id="{{ $cate['tag'] }}" class="panel-collapse collapse">
                        <div class="panel-body">
                            @foreach ($cate->children as $child)
                                <ul>
                                    <li><a href="{{ route('listProductByCate', $child['id']) }}">{{ $child['name'] }}
                                        </a></li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <!--/category-products-->

    <div class="brands_products">
        <!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
            @foreach ($brands as $b)
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{ route('products-by-brand', $b['id']) }}"> <span
                                class="pull-right">({{ $b->products->count() }})</span>{{ $b['name'] }}</a></li>
                </ul>
            @endforeach
        </div>
    </div>
    <!--/brands_products-->

    <div class="news">
        <!--recommended_items-->
        <h2 class="title text-center">News</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($news as $key => $n)
                    @if ($key == 0)
                        <div class="item active">
                            <div class="product-image-wrapper">

                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        <a href="{{ route('show-news', $n->id) }}"><img
                                                src="@foreach ($n->images as $key => $image)  @if ($key == 0) {{ URL::to('/') }}/{{ $image['path'] }} @endif @endforeach"></a>
                                        <div>
                                            <h5>{{ $n['title'] }}</h5>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach ($news as $key => $n)
                    @if ($key != 0)
                        <div class="item">
                            <div class="product-image-wrapper">

                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        <a href="{{ route('show-news', $n->id) }}"><img
                                                src="@foreach ($n->images as $key => $image)  @if ($key == 0) {{ URL::to('/') }}/{{ $image['path'] }} @endif @endforeach"></a>
                                        <div>
                                            <h5>{{ $n['title'] }}</h5>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
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
@push('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation: true, // Show next and prev buttons
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true
        });

    });
</script>
@endpush
