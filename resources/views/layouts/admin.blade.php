<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('seo.title_admin'))</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        body { font-family: system-ui, sans-serif; background: #f4f8f9; padding: 20px; color: #112a2d; margin: 0; }
        .container { max-width: 1200px; margin: auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 10px 30px rgba(17,42,45,0.1); }
        .nav { margin-bottom: 20px; border-bottom: 2px solid #f0f0f0; padding-bottom: 15px; }
        .nav a { text-decoration: none; padding: 10px 20px; margin-right: 10px; background: #e0e6e7; color: #112a2d; border-radius: 6px; font-weight: bold; transition: 0.3s; display: inline-block;}
        .nav a:hover, .nav a.active { background: #368187; color: white; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #d2dedf; }
        th { background: #368187; color: white; }
        .btn-primary { background: #e97f32; color: white; border: none; padding: 8px 15px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .btn-primary:hover { background: #cf681f; }
        .alert-success { color: #155724; font-weight: bold; padding: 12px; background: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 15px;}
        .alert-error { color: #721c24; font-weight: bold; padding: 12px; background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 5px; margin-bottom: 15px;}
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-family: monospace; box-sizing: border-box; }
        pre.log-viewer { background: #1e1e1e; color: #00ff00; padding: 15px; border-radius: 5px; overflow-x: auto; max-height: 600px; font-size: 13px; line-height: 1.5; white-space: pre-wrap; word-wrap: break-word;}
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            @if(session('super_admin'))
                <a href="/admin/leads" class="{{ request()->is('admin/leads') ? 'active' : '' }}">Khách hàng</a>
                <a href="/admin/settings" class="{{ request()->is('admin/settings') ? 'active' : '' }}">Cấu hình Zalo</a>
                <a href="/admin/logs" class="{{ request()->is('admin/logs') ? 'active' : '' }}">System Logs</a>
                
                <a href="/admin/logout" style="float:right; background:#dc3545; color:white;">Đăng xuất</a>
            @endif
            <a href="/" target="_blank" style="float:right; background:#f0f0f0; color:#333;">Trang chủ ↗</a>
        </div>
        
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
