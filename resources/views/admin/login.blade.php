@extends('layouts.admin')

@section('title', 'Đăng nhập Quản trị - MS-Apptech')

@section('content')
    <div style="max-width: 400px; margin: 50px auto; text-align: center;">
        <h2>Bảo mật Hệ thống</h2>
        <p>Vui lòng nhập Super Key để tiếp tục.</p>

        <form action="/admin/login" method="POST" style="margin-top: 20px;">
            @csrf
            <div class="form-group">
                <input type="password" name="super_key" class="form-control" placeholder="Nhập Super Key..." required style="text-align: center; font-size: 16px; padding: 12px;">
            </div>
            
            <button type="submit" class="btn-primary" style="width: 100%; padding: 12px; font-size: 16px;">Xác nhận</button>
        </form>
    </div>
@endsection
