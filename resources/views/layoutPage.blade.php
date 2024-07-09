<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <link rel="stylesheet" href="{{ asset('build/app.css') }}">

</head>

<body>
    <header>
        @include('header')
    </header>
    <!-- end header -->
    <div class="product-details-tille">
        <div class="row">
            <div class="col-12">
                <h3>@yield('titlePage')</h3>
                <p>Trang chủ <i class="fa-solid fa-chevron-right"></i> <a href="#">@yield('titlePage')</a></p>
            </div>
        </div>
    </div>
    <!-- section blog -->
    <main>
       @yield('content')
    </main>
    <!-- end section blog -->
    <!-- footer -->
    @include('footer')
    <!-- end footer -->
    <script src="https://kit.fontawesome.com/25f02dadc5.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script src="{{ asset('build/app.js') }}"></script>
</body>

</html>