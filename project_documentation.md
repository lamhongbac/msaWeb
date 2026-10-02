# Tài liệu Mô tả Dự án: LandingPageAIChampionFnB (Cập nhật)

## 1. Tổng quan dự án
**LandingPageAIChampionFnB** là một ứng dụng Web được xây dựng trên framework **Laravel**, sử dụng cơ sở dữ liệu **SQLite**. 
Hệ thống hiện tại đóng vai trò là một cổng thông tin (Portal) chuyên biệt, giới thiệu các dịch vụ tư vấn AI của MS-Apptech và khóa học F&B. Nó cho phép khách hàng đăng ký nhận tư vấn và quản trị viên quản lý danh sách tập trung.

**Tính năng cốt lõi (Cập nhật mới nhất):**
- Hiển thị Trang chủ tổng hợp dịch vụ và Trang chi tiết khóa học với giao diện phong cách **MongoDB-inspired** (Sạch sẽ, hiện đại, màu Xanh/Cam SAOMAI).
- Form thu thập thông tin khách hàng tiềm năng linh hoạt, **tự động nhận diện dịch vụ khách quan tâm** và thay đổi kích thước tối ưu (75% scale native).
- Hệ thống UI được Module hóa (Components dùng chung) như Header, Footer, Modal với các hiệu ứng Animation mượt mà.
- Tích hợp **API Zalo OA** với cơ chế **Auto-Refresh Token thông minh** và cấu hình gửi tin nhắn hàng loạt từ file JSON.
- Đóng gói triển khai (Deployment) siêu nhẹ, toàn bộ DB và mã nguồn được tích hợp chung.

---

## 2. Cấu trúc Database & Model
Dự án sử dụng cơ sở dữ liệu **SQLite** (`database/database.sqlite`), giúp tối ưu hóa việc triển khai (không cần cài đặt MySQL).

### Model `Lead` (`app/Models/Lead.php`)
Dùng để lưu trữ thông tin của người dùng đăng ký qua form popup.
**Các trường dữ liệu:**
- `fullname`: Họ và tên khách hàng.
- `phone`: Số điện thoại.
- `company`: Tên đơn vị / công ty.
- `category`: Dịch vụ quan tâm (Ví dụ: "Thuê Ngoài Giám Đốc CĐS & CNTT", "Đào tạo AI ngành F&B", "Phát Triển Phần Mềm AI-Driven").
- `problem`: Vấn đề khách hàng đang gặp phải hoặc cần tư vấn.
- `is_read`: Trạng thái đã đọc/chưa đọc.

---

## 3. Luồng hoạt động & Các Routes (`routes/web.php`)

| Route | Phương thức | Controller & Action | Chức năng |
|-------|-------------|---------------------|-----------|
| `/` | `GET` | *Closure* | Trả về view `welcome.blade.php` (Trang chủ MS-Apptech). Đã sắp xếp theo mức độ ưu tiên mới: Tư Vấn CĐS -> Đào Tạo AI -> Phần mềm. |
| `/course/fnb` | `GET` | *Closure* | Trả về view `course/fnb.blade.php` (Trang chi tiết Khóa học F&B). |
| `/submit-form` | `POST` | `LeadController@store` | Nhận dữ liệu từ popup, lưu Database và gửi thông báo Zalo. |
| `/admin/leads` | `GET` | `LeadController@index` | Trả về view `admin.blade.php` hiển thị danh sách khách hàng. |
| `/admin/leads/{id}/read` | `POST` | `LeadController@markAsRead`| Đánh dấu một lượt đăng ký là "Đã đọc". |

---

## 4. Logic Xử lý (`app/Http/Controllers/LeadController.php`)

Controller xử lý nghiệp vụ trung tâm:

- **`store(Request $request)`**:
  - Ghi nhận thông tin Leads vào SQLite.
  - Gọi hàm `sendZaloNotification()` để gửi tin nhắn.
  - Xử lý các lỗi HTTP Zalo API bằng `try-catch` và ghi lỗi qua `\Log::error()`.

- **`sendZaloNotification($lead)` & Cơ chế Auto-Refresh Token**:
  - **Dynamic Title**: Tiêu đề tin nhắn gửi qua Zalo được tự động sinh (viết hoa) dựa trên đúng danh mục khách hàng vừa chọn.
  - Đọc cấu hình từ file `zalo_receivers.json` để lấy danh sách người nhận (Hỗ trợ lặp qua nhiều Admin Zalo UID) và Access Token.
  - Nếu Zalo API trả về mã lỗi `-216` hoặc `-124` (Access Token hết hạn), hệ thống sẽ **lập tức** gọi hàm `refreshZaloToken()` để cấp mới Token, cập nhật đè vào file JSON và tự động Retry gửi lại tin nhắn mà khách hàng không hề hay biết sự cố.

---

## 5. Kiến trúc Giao diện (UI/UX) & CSS

Giao diện đã được nâng cấp đồng bộ theo phong cách MongoDB:
- **`public/css/theme-mongo.css`**: File CSS cốt lõi, quản lý toàn bộ hệ thống màu (`--mongo-dark`, `--mongo-green-dark`, `#e97f32` cam SAOMAI), Typography (`Inter`) và các Component.
- **Thanh Menu (Header)**: Các Menu Item được làm đậm (`font-weight: 700`) kèm theo hiệu ứng "Sliding Underline" (Gạch chân trượt ngang chuyển cam) khi Hover và Focus.
- **Form Đăng Ký (Modal)**: Đã được **Scale down native xuống 75%** thông qua việc tinh chỉnh Width (390px), Padding và Font Size, đảm bảo form gọn gàng, sắc nét.
- **Layout Trang Chủ**: Các block được sắp xếp lại theo thứ tự ưu tiên chiến lược của công ty:
  1. *Thuê Ngoài Giám Đốc CĐS & CNTT*
  2. *Đào tạo AI Ngành F&B* (Đẩy lên vị trí 2)
  3. *Phát triển Phần mềm AI-Driven* (Đẩy xuống vị trí 3)
  4. *Stats (Thống kê & Sản phẩm)*

---

## 6. Triển khai (Deployment) & Cấu hình (Config)

Hệ thống được thiết kế để dễ dàng triển khai nhất trên các Hosting truyền thống.

1. **File `zalo_receivers.json` (Cấu hình Zalo Trung tâm)**:
   - Nằm ở thư mục gốc của dự án.
   - Chứa thông tin: `app_id`, `secret_key`, `access_token`, `refresh_token` và mảng `receivers` (Zalo User ID).
   - Việc thêm/bớt Admin nhận tin nhắn Zalo chỉ cần chỉnh sửa file JSON này mà không cần can thiệp vào Source Code.

2. **Đóng gói Triển Khai (`MS_Apptech_LandingPage_SourceCode.zip`)**:
   - Toàn bộ Source Code (bao gồm thư mục Vendor) và file Database SQLite (`database/database.sqlite`) đã được nén chung thành 1 file ZIP.
   - **Quá trình Deploy lên cPanel/DirectAdmin**: 
     - Chỉ cần Upload và Extract file ZIP lên thư mục `public_html`.
     - Cấu hình lại `.env` (`APP_ENV=production`, `APP_DEBUG=false`).
     - Không cần Export/Import cơ sở dữ liệu MySQL, mọi dữ liệu Leads cũ đều đi kèm trong SQLite an toàn và tiện lợi.

3. **Bảo mật trang Admin**: Route `/admin/leads` hiện chưa có middleware xác thực (`auth`). Khuyến nghị bổ sung cơ chế đăng nhập (Authentication) trong tương lai.
