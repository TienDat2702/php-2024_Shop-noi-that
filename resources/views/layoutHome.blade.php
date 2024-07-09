<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
</head>

<body>
    <header>
        @include('header')
    </header>
    <!-- end header -->
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
</body>

</html>