<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | E-Shopper</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css')}}" rel="stylesheet">
    {{-- <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js')}}"></script> --}}


    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">

    <!-- Default Theme -->
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">

    <!-- Include js plugin -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<!--/head-->

<body>
    <!--header-->
    @include('partials.header')
    <!--/header-->
    @yield('content')
    <!--Footer-->
    @include('partials.footer')
    <!--/Footer-->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/bootstrap3-typeahead.js') }}"></script>
    <script src="{{ asset('js/price-range.js')}}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="{{ asset('js/bloodhound.min.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    @stack("javascript")
    <script type="text/javascript">
        $(document).ready(function($) {
            var engine = new Bloodhound({
                remote: {
                    url: '/search/product?value=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $('.search-input').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, [{
                source: engine.ttAdapter(),
                name: 'name',
                display: function(data) {
                    return data.name;
                },
                templates: {
                    empty: [
                        '<div class="header-title"></div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="header-title"></div><div class="list-group search-results-dropdown"></div>'
                    ],
                    suggestion: function(data) {
                        return '<a href="/product/' + data.id + '/details" class="list-group-item">' + data.name + '</a>';
                    }
                }
            }]);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function($) {
             $('#cart').click(function(e){
                 if(localStorage.getItem('cart') == null || empty(localStorage.getItem('cart')) )
                    e.preventDefault();
                    alert("Giỏ hàng chưa có gì !!")
             });
        });
    </script>
</body>
</html>
