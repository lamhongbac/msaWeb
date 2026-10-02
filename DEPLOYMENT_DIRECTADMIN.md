# Hướng dẫn Triển khai LandingPageAIChampionFnB lên DirectAdmin (Mắt Bão)

Tài liệu này hướng dẫn chi tiết các bước đưa dự án **LandingPageAIChampionFnB** (Laravel + SQLite) lên hosting sử dụng control panel **DirectAdmin** (với tên miền ví dụ: `https://ms-apptech.vn`). Do dự án sử dụng SQLite nên việc triển khai cực kỳ đơn giản và nhanh gọn.

---

## Bước 1: Chuẩn bị mã nguồn & Cấu hình trước khi nén (Tại máy tính cá nhân)

1. Mở file `.env` bằng trình soạn thảo (VS Code, Notepad).
2. Chỉnh sửa các thông số sau để chuyển từ môi trường thử nghiệm sang môi trường thật (Production):
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://ms-apptech.vn
   ```
   *(Mẹo: Sau khi tải lên Hosting xong, nếu bạn muốn tiếp tục code trên máy cá nhân, hãy đổi lại thành `APP_ENV=local` và `APP_DEBUG=true`).*
3. Đảm bảo cấu hình Database đang là `sqlite` và các cấu hình SEO, Zalo đều đã đầy đủ.
4. Xóa cache cục bộ bằng cách mở Terminal (hoặc CMD) tại thư mục dự án và chạy các lệnh:
   ```bash
   php artisan config:clear
   php artisan route:clear
   php artisan view:clear
   ```
5. Đảm bảo toàn bộ Database (thư mục `database/`) và các thư viện (thư mục `vendor/`) đã được tải đầy đủ về máy.
6. Quét chọn toàn bộ các file (bao gồm cả file ẩn `.env`), chuột phải và nén thành một file `.zip` duy nhất (Ví dụ: `MS_Apptech_SourceCode.zip`).

---

## Bước 2: Upload mã nguồn lên Hosting DirectAdmin

1. Đăng nhập vào trang quản trị DirectAdmin của nhà cung cấp Mắt Bão.
2. Tại giao diện chính, tìm và chọn mục **File Manager**.
3. Di chuyển vào thư mục gốc có tên là **`public_html`**. 
   > **Lưu ý quan trọng:** Tuyệt đối không xóa 2 thư mục hệ thống có sẵn là `cgi-bin` và `.well-known`.
4. Click chuột phải vào vùng trống trong màn hình, chọn **Upload File** và tải lên file `.zip` mã nguồn đã chuẩn bị ở Bước 1.
5. Chờ quá trình upload hoàn tất, click chuột phải vào file `.zip` vừa tải lên và chọn **Extract** (Giải nén). Đảm bảo tất cả các thư mục dự án (app, bootstrap, public...) nằm trực tiếp bên trong `public_html`.

---

## Bước 4: Chuyển hướng thư mục `public` bằng `.htaccess`

Với framework Laravel, mã nguồn chạy thực tế qua thư mục `public`. Để người dùng truy cập tên miền tự động chạy file trong `public` mà không bị lộ cấu trúc, ta làm như sau:

1. Cũng tại giao diện File Manager trong `public_html`, click chuột phải vào khoảng trống và chọn **Create File**.
2. Đặt tên file mới là **`.htaccess`**.
3. Click chuột phải vào file `.htaccess` vừa tạo, chọn **Edit**.
4. Dán đoạn mã sau vào và nhấn **Save**:
   ```apache
   <IfModule mod_rewrite.c>
       RewriteEngine On
       RewriteRule ^(.*)$ public/$1 [L]
   </IfModule>
   ```

---

## Bước 5: Cấp quyền phân quyền (Permissions)

Vì sử dụng SQLite dạng file vật lý, Laravel cần quyền "Ghi" để lưu trữ thông tin đăng ký mới và xuất log hệ thống.

1. Tìm đến file **`database/database.sqlite`** (trong `public_html/database/`).
2. Click chuột phải vào file này, chọn **Set Permissions** (hoặc Change Permissions).
3. Thiết lập quyền (Chmod) thành **`775`** hoặc **`777`** (đảm bảo tick chọn Read và Write).
4. Làm tương tự, thiết lập quyền **`775`** hoặc **`777`** cho toàn bộ thư mục **`storage`** (nằm ở `public_html/storage`).

---

## Bước 6: Kiểm tra và Vận hành

1. Xóa file `.zip` ban đầu đã tải lên để giải phóng dung lượng hosting.
2. Mở trình duyệt web (nên mở tab ẩn danh), truy cập vào tên miền `https://ms-apptech.vn` để xem giao diện web hoạt động.
3. Thử submit 1 form đăng ký để đảm bảo dữ liệu ghi vào SQLite thành công và Zalo OA gửi thông báo.
4. **Quản lý Zalo OA:** Mọi thay đổi về ID người nhận tin nhắn Zalo đều có thể chỉnh sửa trực tiếp trên file `zalo_receivers.json` thông qua File Manager mà không cần đụng chạm mã nguồn hệ thống.
