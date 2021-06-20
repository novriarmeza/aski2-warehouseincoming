<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
  </head>
  <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-info shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">GR MANUAL ASKI PLANT 2</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav">
                        <a class="nav-link nav-item" href="{{url('/')}}">Input Kedatangan OS</a>
                        <a class="nav-link nav-item" href="{{url('/edit')}}">Edit</a>
                        <a class="nav-link nav-item" href="{{url('/dataos')}}">Data OS</a>
                    </div>
                </div>
            </div>
        </nav>

        @yield('container')



    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/datatable.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    @yield('js')
    @yield('jspagination')
</body>
</html>
