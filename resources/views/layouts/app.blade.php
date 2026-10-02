<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <title>@yield('title', 'AI F&B Management Champions')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <!-- Hàm asset() của Laravel sẽ tự động trỏ đúng đường dẫn vào thư mục public -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-mongo.css') }}">
</head>
<body>
    @include('partials.header')

    <!-- Nơi các trang con sẽ đổ dữ liệu vào -->
    @yield('content')

    @include('partials.footer')

    <!-- Modal Form -->
    <div class="modal" id="modal">...</div>
    <script>...</script>
</body>
</html>
