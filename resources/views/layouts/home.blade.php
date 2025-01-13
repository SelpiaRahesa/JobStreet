<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Jobstreet</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
	<link rel="stylesheet" href="{{asset('assets/frontend/motivatin/css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/frontrend/motivation/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontrend/motivation/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/motivation/css/tiny-slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/motivation/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/motivation/css/glightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/motivation/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/motivation/css/flatpickr.min.css')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/frontend/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/frontend/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/frontend/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/frontend/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{asset('assets/frontend/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{asset('assets/frontend/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{asset('assets/frontend/css/theme.css')}}" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        @include('layouts.user.nav')

        @yield('content')

        @include('layouts.user.footer')
      </section>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

    <script src="{{asset('assets/frontend/vendors/@popperjs/popper.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/frontend/vendors/is/is.min.js')}}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{asset('assets/frontend/js/theme.js')}}"></script>
    <script src="{{asset('assets/frontend/motivation/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/motivation/js/tiny-slider.js')}}"></script>

    <script src="{{asset('assets/frontend/motivation/js/flatpickr.min.js')}}"></script>


    <script src="{{asset('assets/frontend/motivation/js/aos.js')}}"></script>
    <script src="{{asset('assets/frontend/motivation/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/frontend/motivation/js/navbar.js')}}"></script>
    <script src="{{asset('assets/frontend/motivation/js/counter.js')}}"></script>
    <script src="{{asset('assets/frontend/motivation/js/custom.js')}}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap" rel="stylesheet">
  </body>

</html>
