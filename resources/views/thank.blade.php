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

    <main>
        <div class="thank"><i class="fa-regular fa-circle-check"></i>
            <h1 class="mb-5">cám ơn quá khách đã mua hàng</h1>
        <a href="{{ route('home')}}" class="mt-3 btn-add-to-cart">Tiếp tục mua hàng</a>
        </div>
    </main>

    <script src="https://kit.fontawesome.com/25f02dadc5.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script src="{{ asset('build/app.js') }}"></script>
</body>

</html>
