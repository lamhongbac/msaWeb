@extends('layouts.admin')

@section('title', 'Cấu hình Zalo OA - MS-Apptech')

@section('content')
    <h2>Cấu hình Zalo OA</h2>
    <p>Thay đổi mã Access Token hoặc thêm bớt người nhận thông báo tại đây.</p>

    <form action="/admin/settings" method="POST">
        @csrf
        <div class="form-group">
            <label for="app_id">App ID</label>
            <input type="text" name="app_id" id="app_id" class="form-control" value="{{ $config['app_id'] ?? '' }}">
        </div>

        <div class="form-group">
            <label for="secret_key">Secret Key</label>
            <input type="text" name="secret_key" id="secret_key" class="form-control" value="{{ $config['secret_key'] ?? '' }}">
        </div>

        <div class="form-group">
            <label for="access_token">Access Token (Token dùng để gửi tin nhắn)</label>
            <textarea name="access_token" id="access_token" class="form-control" rows="4">{{ $config['access_token'] ?? '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="refresh_token">Refresh Token (Dùng để xin lại Access Token mới khi hết hạn)</label>
            <textarea name="refresh_token" id="refresh_token" class="form-control" rows="4">{{ $config['refresh_token'] ?? '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="receivers">Người nhận tin nhắn (Các Zalo User ID, cách nhau bằng dấu phẩy)</label>
            <input type="text" name="receivers" id="receivers" class="form-control" value="{{ isset($config['receivers']) ? implode(',', $config['receivers']) : '' }}" placeholder="VD: 123456789,987654321">
        </div>

        <button type="submit" class="btn-primary">Lưu cấu hình</button>
    </form>
@endsection
