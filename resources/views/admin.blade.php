@extends('layouts.admin')

@section('title', 'Quản trị Khách hàng - MS-Apptech')

@section('content')
    <h2>Danh sách Khách hàng Đăng ký Tư vấn AI F&B</h2>

    <!-- Form Bộ Lọc -->
    <form action="/admin/leads" method="GET" style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px; display: flex; gap: 15px; flex-wrap: wrap; align-items: center;">
        <div>
            <label style="font-weight: bold; margin-right: 5px;">Trạng thái:</label>
            <select name="status" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
                <option value="all" {{ request('status', 'all') === 'all' ? 'selected' : '' }}>Tất cả</option>
                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Chưa xử lý</option>
                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Đã xử lý</option>
            </select>
        </div>
        
        <div>
            <label style="font-weight: bold; margin-right: 5px;">Dịch vụ:</label>
            <select name="category" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
                <option value="all" {{ request('category', 'all') === 'all' ? 'selected' : '' }}>Tất cả</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
        </div>

        <div style="flex-grow: 1;">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm theo tên, SĐT, bài toán..." style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
        </div>

        <button type="submit" class="btn-primary" style="padding: 8px 20px;">Lọc / Tìm kiếm</button>
        <a href="/admin/leads" style="padding: 8px 15px; background: #ddd; color: #333; text-decoration: none; border-radius: 5px;">Xóa bộ lọc</a>
    </form>

    <div style="margin-bottom: 10px; font-weight: bold;">
        Tổng số: {{ $leads->total() }} bản ghi.
    </div>

    <table>
        <thead>
            <tr>
                <th>Ngày đăng ký</th>
                <th>Họ và Tên</th>
                <th>Số điện thoại</th>
                <th>Đơn vị / Nhà hàng</th>
                <th>Dịch vụ quan tâm</th>
                <th>Bài toán cần giải quyết</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leads as $lead)
            <tr style="{{ $lead->is_read ? '' : 'background: #fff3cd; font-weight: bold;' }}">
                <td>{{ $lead->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $lead->fullname }}</td>
                <td>{{ $lead->phone }}</td>
                <td>{{ $lead->company }}</td>
                <td>{{ $lead->category }}</td>
                <td>{{ $lead->problem }}</td>
                <td>
                    @if($lead->is_read)
                        <span style="color: #8fa0a3; font-size: 13px;">✓ Đã xử lý</span>
                    @else
                        <form action="/admin/leads/{{ $lead->id }}/read" method="POST">
                            @csrf
                            <button type="submit" class="btn-primary">Đánh dấu đã đọc</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div style="margin-top: 20px;">
        {{ $leads->links() }}
    </div>
@endsection

