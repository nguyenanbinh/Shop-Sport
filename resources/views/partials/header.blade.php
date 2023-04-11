<header id="header">
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icon pull-right">
                        @if(!Auth::check())
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                Account
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a href="{{route('login')}}" class="active"><i class="fa"></i> Login</a></li>
                                <li><a href="{{route('register')}}" class="active"><i class="fa"></i> Register</a></li>
                            </div>
                        </div>

                        @else
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                {{Auth::user()->name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a href="{{route('account-customer')}}" class="active"><i class="fa fa-bars"></i> Your Account</a></li>
                                <li><a href="{{route('logout')}}" class="active"><i class="fa fa-unlock"></i> Logout</a></li>
                            </div>
                        </div>
                        @endif
                    </div> <!-- /header_top -->
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href=""><img src="" alt="" /></a>
                    </div>
                    <!-- <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canada</a></li>
                                <li><a href="">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canadian Dollar</a></li>
                                <li><a href="">Pound</a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <!-- <li><a href=""><i class="fa fa-user"></i> Account</a></li> -->
                            <!-- <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li> -->
                            <li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a id="cart" href="{{route('show-cart')}}"><i class="fa fa-shopping-cart"><span style="color:red" class="cart-value count_item_pr"></span></i>Cart</a></li>
                            <!-- <li style="margin:0" class="cart-value count_item_pr"></li> -->
                            <!-- <li><a href="{{route('show-cart')}}">Cart</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ route('homepage')}}">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{route('show-products')}}">Products</a></li>
                                    <!-- <li><a href="">Product Details</a></li> -->
                                    <li><a href="#">Checkout</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('form-contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <!-- <div class="row"> -->
                            <!-- <div class="col-md-9"> -->
                                @if(empty($request->q))
                                <form class="typeahead" role="search" action="{{ route('search') }}" method="POST" id="search">
                                    @csrf
                                    <input type="search" name="q" class="search-input" placeholder="Type something..." autocomplete="off">
                                    <button type="submit" form="search"><i class="fa fa-search"></i></button>
                                </form>
                                @else
                                <form class="typeahead" role="search" action="{{ route('search-get') }}" method="GET" id="search">
                                    @csrf
                                    <input type="search" name="q" class="search-input" placeholder="Type something..." autocomplete="off">
                                    <button type="submit" form="search"><i class="fa fa-search"></i></button>
                                </form>
                                @endif
                            <!-- </div> -->
                            <!-- <div class="col-md-3"> -->
                                <!-- <button type="submit" form="search" name="search"><i class="fa fa-search"></i></button> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    <div id="search-suggest" class="s-suggest"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
