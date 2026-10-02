@extends('layouts.admin')

@section('title', 'System Logs - MS-Apptech')

@section('content')
    <h2>System Logs</h2>
    <p>Nhật ký hệ thống (Lỗi Zalo API, Lỗi gửi tin nhắn... sẽ hiển thị ở đây).</p>

    <div style="margin-bottom: 15px;">
        <form action="/admin/logs/clear" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa toàn bộ log?');">
            @csrf
            <button type="submit" style="background: #dc3545;" class="btn-primary">Xóa toàn bộ Logs</button>
        </form>
    </div>

    @if($logs)
        <pre class="log-viewer">{{ $logs }}</pre>
    @else
        <div style="background: #e9ecef; padding: 20px; text-align: center; border-radius: 5px;">
            Không có lỗi nào được ghi nhận. Hệ thống đang hoạt động tốt!
        </div>
    @endif
@endsection
