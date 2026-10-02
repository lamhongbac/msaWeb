# Tài liệu Kỹ thuật & Chuyển giao Dự án (Technical Handover Document)
**Tên dự án:** LandingPageAIChampionFnB  
**Khách hàng/Sở hữu:** MS-Apptech  

Tài liệu này được biên soạn nhằm mục đích giúp các lập trình viên (Developer) mới tiếp nhận dự án có thể nhanh chóng nắm bắt cấu trúc, logic cốt lõi và phương pháp bảo trì hệ thống.

---

## 1. Tổng quan Hệ thống (System Overview)
**LandingPageAIChampionFnB** là một ứng dụng Web tĩnh kết hợp tính năng thu thập thông tin khách hàng tiềm năng (Leads Capture) đóng vai trò là Cổng thông tin giới thiệu dịch vụ tư vấn AI của MS-Apptech và khóa học F&B.
Điểm nhấn kỹ thuật của dự án là tính **tối giản trong triển khai (Zero-Config DB)** và **tự động hóa thông báo qua Zalo**.

### 1.1 Tech Stack (Công nghệ sử dụng)
- **Framework Core:** Laravel (PHP).
- **Database:** SQLite (Dạng file vật lý tĩnh, không cần cài đặt MySQL Server).
- **Frontend:** Blade Template Engine, HTML5, Vanilla CSS, JS cơ bản.
- **Tích hợp bên thứ 3:** Zalo OpenAPI (Gửi tin nhắn OA, OAuth v4).

---

## 2. Kiến trúc & Cấu trúc Thư mục (Directory Structure)
Dự án bám sát cấu trúc chuẩn của Laravel, các thành phần bị chỉnh sửa chính nằm ở:

- **`app/Models/Lead.php`**: Model duy nhất tương tác với Database.
- **`app/Http/Controllers/LeadController.php`**: Trái tim của dự án, chứa toàn bộ logic xử lý lưu data, gọi API Zalo, và các logic của trang Admin.
- **`routes/web.php`**: Định tuyến toàn bộ web (Trang chủ, Khóa học, Xử lý form, Admin).
- **`database/database.sqlite`**: File Database SQLite chứa dữ liệu thật (Bắt buộc phải set quyền Write 775/777 trên host).
- **`zalo_receivers.json`**: (Root dir) File cấu hình Zalo, lưu trữ Token và danh sách người nhận thông báo.
- **`public/css/theme-mongo.css`**: File CSS chứa UI token, color palette (Xanh/Cam).
- **`resources/views/`**:
  - `welcome.blade.php`: Trang chủ chính.
  - `course/fnb.blade.php`: Landing page khóa học.
  - `layouts/app.blade.php` & `partials/`: Component layout cho User.
  - `layouts/admin.blade.php` & `admin/`: Component layout và view cho trang Quản trị.

---

## 3. Database Schema (Schema Khách hàng)
Hệ thống sử dụng bảng `leads` để lưu trữ dữ liệu.
- `id`: Khóa chính (Auto Increment).
- `fullname`: Tên khách hàng.
- `phone`: Số điện thoại.
- `company`: Tên đơn vị / nhà hàng.
- `category`: Dịch vụ mà khách đang quan tâm (Auto-detect từ button mà khách bấm vào).
- `problem`: (Nullable) Mô tả khó khăn.
- `is_read`: Boolean (0/1) - Trạng thái đã xử lý bởi admin hay chưa.
- `created_at` / `updated_at`: Laravel timestamps.

---

## 4. Logic cốt lõi: Auto-Refresh Zalo Token (Bảo trì)
Đây là phần logic quan trọng nhất cần chú ý khi maintain. Nằm trong `LeadController@sendZaloNotification`.

**Vấn đề:** Access Token của Zalo OA chỉ sống được khoảng 24-26 tiếng.
**Cách giải quyết (Flow):**
1. Đọc credentials từ file tĩnh `zalo_receivers.json`.
2. Gọi cURL/HTTP POST gửi tin nhắn qua `openapi.zalo.me/v3.0/oa/message/cs`.
3. Kiểm tra response. Nếu có lỗi **-216** (invalid) hoặc **-124** (expired), biến cờ `$hasRefreshed` được check.
4. Gọi hàm `refreshZaloToken()`: Bắn Refresh Token (sống 90 ngày) lên `oauth.zaloapp.com` để xin Access Token mới và Refresh Token mới.
5. Ghi đè file `zalo_receivers.json` với cặp Token mới.
6. Sử dụng `goto retry_send;` để quay ngược luồng code, thử gửi lại tin nhắn tự động.

> ⚠️ **Cảnh báo Maintainer:** Miễn là hệ thống có lead đổ về < 90 ngày 1 lần, vòng lặp token này sẽ sống vĩnh viễn. Nếu quá 90 ngày không có lead nào, Refresh Token sẽ chết và Admin phải lấy lại token hoàn toàn thủ công qua Zalo Developer. Admin có thể chủ động cấu hình qua giao diện `/admin/settings`.

---

## 5. UI/UX & Styling Guidelines
Hệ thống Frontend không sử dụng Bootstrap/Tailwind để tối ưu tốc độ, mà tự code CSS (Vanilla) theo chuẩn biến (CSS Variables).
Nằm tại `public/css/theme-mongo.css`:
- `--mongo-dark`: Màu xanh thẫm chủ đạo.
- `--mongo-green-dark`: Xanh lục bảo.
- Tông Cam điểm xuyết (`#e97f32`): Dùng cho Call-to-action button, các underline hover effect.
- **Quy tắc sửa UI Component:** Form Popup (Modal) đang được scale bằng native CSS để nhỏ lại 75% (`width: 390px`, padding nhỏ). Khi thêm field vào form, nhớ kiểm tra UI trên Mobile.

---

## 6. Hướng dẫn Cài đặt Môi trường Local (Local Development)

Để dev mới setup dự án trên máy tính cá nhân:
1. Clone / Tải mã nguồn về.
2. Kiểm tra PHP (Khuyến nghị 8.1+) và Composer.
3. Chạy lệnh: `composer install`.
4. Đổi tên file `.env.example` thành `.env`.
5. Đảm bảo cấu hình file `.env`:
   ```env
   APP_ENV=local
   APP_DEBUG=true
   DB_CONNECTION=sqlite
   # KHÔNG cần set DB_HOST, DB_DATABASE...
   ```
6. Sinh App key: `php artisan key:generate`.
7. Chạy dự án: `php artisan serve`. 
8. *(Tùy chọn)* Nếu cần migrate lại database trống rỗng, chạy: `php artisan migrate:fresh`. Tuy nhiên thông thường dev có thể dùng luôn file `database.sqlite` có sẵn.

---

## 7. Triển khai (Deployment Checklist)
Khi đẩy code lên Server / Hosting (Shared Hosting, cPanel, DirectAdmin):
1. **Nén ZIP:** Nén toàn bộ cả thư mục `vendor` và file `database.sqlite` để upload (Tránh việc không chạy được `composer install` trên Shared Host).
2. **File `.env`:** 
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_URL=https://yourdomain.com`
3. **Phân quyền (Chmod):** Set quyền Write (`775` hoặc `777`) cho:
   - Thư mục `storage` và thư mục con `storage/logs`.
   - File Database `database/database.sqlite` và nguyên cái folder chứa nó là `database`.
   - File cấu hình Zalo `zalo_receivers.json`.
4. **Public Directory:** Nếu đưa lên Shared Hosting (DirectAdmin) dùng `public_html`, tạo 1 file `.htaccess` chuyển hướng luồng traffic vào thư mục `public/` (Xem hướng dẫn chi tiết trong file `DEPLOYMENT_DIRECTADMIN.md`).
