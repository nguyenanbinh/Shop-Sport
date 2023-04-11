<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin ~~</title>

  <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body >

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Start DashBorad </div>
      <div class="list-group list-group-flush">
      
        <a href="{{route('admin.categories.list')}}" class="list-group-item list-group-item-action bg-light">Categories</a>
        {{-- @can('admin') --}}
      <a href="{{ route('admin.products.list') }}" class="list-group-item list-group-item-action bg-light">Products</a>
        {{-- @endcan --}}
        <a href="{{ route('admin.users.list') }}" class="list-group-item list-group-item-action bg-light">Users</a>
       
        <a href="{{ route('admin.orders.list') }}" class="list-group-item list-group-item-action bg-light">Order</a>
        <a href="{{ route('admin.roles.list') }}" class="list-group-item list-group-item-action bg-light">Role</a>
        <a href="{{ route('admin.permissions.list') }}" class="list-group-item list-group-item-action bg-light">Permission</a>
        <a href="{{ route('admin.brands.list') }}" class="list-group-item list-group-item-action bg-light">Brand</a>
        <a href="{{ route('admin.sales.list') }}" class="list-group-item list-group-item-action bg-light">Sale</a>
        <a href="{{ route('admin.gallery_image') }}" class="list-group-item list-group-item-action bg-light">Gallery</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name}}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      @if (session('success'))
          <div class="alert alert-success alert-dismissible" style="width:200px;float:right;">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>{{ session('success') }}</strong>
          </div>
          @endif
      @section('content')
      
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
  <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
  <script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
    };
  </script>
  
  @yield('script')
  <!-- Menu Toggle Script -->
 
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>


  <script>
    $(".alert-dismissible").fadeTo(1500, 100).slideUp(500, function(){
        $(".alert-dismissible").alert('close');
    });
     </script>


</body>

</html>
