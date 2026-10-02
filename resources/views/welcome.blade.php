<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ config('seo.desc_home') }}">
    <meta name="keywords" content="{{ config('seo.keys_home') }}">
    <meta property="og:title" content="{{ config('seo.title_home') }}">
    <meta property="og:description" content="{{ config('seo.desc_home') }}">
    <meta property="og:type" content="website">
    <title>{{ config('seo.title_home') }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-mongo.css') }}">
</head>
<body>

    @include('partials.header')

    <!-- HERO SECTION -->
    <header class="hero-mongo">
        <h1>Xây dựng <em>Năng lực số</em><br>Kiến tạo Tương lai</h1>
        <p>SAOMAI mang đến giải pháp công nghệ toàn diện từ tư vấn chiến lược C-level đến phát triển phần mềm và đào tạo ứng dụng AI thực chiến.</p>
        <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; margin-top: 40px;">
            <button class="btn-mongo btn-mongo-primary" onclick="openModal('Thuê Ngoài Giám Đốc CĐS & CNTT')">Khởi động dự án</button>
            <a href="#services" class="btn-mongo btn-mongo-secondary">Tìm hiểu dịch vụ</a>
        </div>
    </header>

    <!-- C-LEVEL CONSULTING SECTION -->
    <section id="it-audit" class="section-mongo section-alt">
        <div class="container-mongo">
            <div class="sectionhead-mongo center">
                <span class="kicker-mongo">Tư vấn chiến lược</span>
                <h2>Thuê Ngoài Giám Đốc CĐS & CNTT</h2>
                <p>Sở hữu tư duy C-level với chi phí tối ưu. Khảo sát hệ thống, lập chiến lược và giám sát triển khai toàn diện.</p>
            </div>
            
            <div class="grid-3">
                <div class="card-mongo">
                    <div class="card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                    <h3>IT & Digital Audit</h3>
                    <p>Khảo sát toàn diện hệ thống công nghệ, tìm ra các "nút thắt" gây lãng phí tài nguyên và chi phí vận hành.</p>
                </div>
                <div class="card-mongo">
                    <div class="card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                    </div>
                    <h3>Digital Strategy</h3>
                    <p>Xây dựng lộ trình Chuyển đổi số 1-3 năm, ưu tiên các dự án mang lại hiệu suất (ROI) cao nhất cho doanh nghiệp.</p>
                </div>
                <div class="card-mongo">
                    <div class="card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <h3>Vendor Management</h3>
                    <p>Đại diện doanh nghiệp đánh giá, lựa chọn và giám sát khắt khe các nhà cung cấp giải pháp công nghệ.</p>
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 48px;">
                <button class="btn-mongo btn-mongo-dark" onclick="openModal('Thuê Ngoài Giám Đốc CĐS & CNTT')">Yêu cầu Tư vấn Chuyên sâu</button>
            </div>
        </div>
    </section>

    <!-- F&B TRAINING SECTION -->
    <section id="fnb" class="section-mongo">
        <div class="container-mongo">
            <div class="sectionhead-mongo center">
                <span class="kicker-mongo">Đào tạo Doanh nghiệp</span>
                <h2>Đào tạo AI Ngành F&B</h2>
                <p>Trang bị "Bộ não số" và tự động hóa tác nghiệp để tối ưu vận hành, cắt giảm chi phí cho chuỗi nhà hàng.</p>
            </div>
            
            <div class="grid-3">
                <div class="card-mongo">
                    <div class="card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <h3>Zero-hallucination</h3>
                    <p>Sử dụng NotebookLM nạp SOP để đảm bảo AI chỉ trích dẫn thông tin chuẩn xác từ tài liệu nội bộ.</p>
                </div>
                <div class="card-mongo">
                    <div class="card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                    </div>
                    <h3>Trợ lý ảo GEM</h3>
                    <p>Thiết kế các trợ lý chuyên biệt cho từng phòng ban: Bếp, Sảnh, Kho, Nhân sự, Marketing.</p>
                </div>
                <div class="card-mongo">
                    <div class="card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg>
                    </div>
                    <h3>Audio Overview</h3>
                    <p>Chuyển đổi tài liệu giấy thành định dạng Podcast để nhân viên tiếp thu kiến thức nhanh chóng.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 48px; display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('course.fnb') }}" class="btn-mongo btn-mongo-dark">Xem Chi Tiết Khóa Học</a>
                <button class="btn-mongo btn-mongo-secondary" onclick="openModal('Đào tạo AI ngành F&B')">Đăng ký tư vấn</button>
            </div>
        </div>
    </section>

    <!-- SOFTWARE DEVELOPMENT SECTION -->
    <section id="software" class="section-mongo section-alt">
        <div class="container-mongo split-mongo">
            <div>
                <span class="kicker-mongo">Giải pháp Phần mềm</span>
                <h2>Phát triển Phần mềm <br>AI-Driven</h2>
                <p style="font-size: 1.125rem; color: var(--mongo-text); margin-bottom: 20px;">
                    Ứng dụng mô hình công nghệ phát triển phần mềm định hướng AI, giúp doanh nghiệp sở hữu sản phẩm nhanh hơn, chất lượng hơn.
                </p>
                <ul class="list-features">
                    <li>AI Clean Code <span>Trợ lý AI rà soát mã nguồn liên tục, giảm thiểu bug.</span></li>
                    <li>Tự động Tài liệu <span>Hệ thống tự động sinh tài liệu kiến trúc L0-L4 chuyên nghiệp.</span></li>
                    <li>Đa Nền Tảng <span>Phát triển Web, Mobile App Native & Cross-platform.</span></li>
                </ul>
                <div style="margin-top: 40px;">
                    <button class="btn-mongo btn-mongo-primary" onclick="openModal('Phát Triển Phần Mềm AI-Driven')">Liên hệ Đội ngũ Kỹ sư</button>
                </div>
            </div>
            <div style="background: var(--mongo-bg-alt); padding: 40px; border-radius: 20px; border: 1px solid var(--mongo-border); box-shadow: 0 20px 40px rgba(0,30,43,0.05);">
                <pre style="background: var(--mongo-dark); color: #fff; padding: 24px; border-radius: 8px; overflow-x: auto; font-family: monospace; font-size: 14px; line-height: 1.5; margin: 0;">
<span style="color: #c792ea">import</span> { AIService } <span style="color: #c792ea">from</span> <span style="color: #c3e88d">'@saomai/ai-core'</span>;

<span style="color: #89ddff">const</span> app = <span style="color: #82aaff">new</span> Application();
app.<span style="color: #82aaff">use</span>(<span style="color: #82aaff">new</span> AIService({
  mode: <span style="color: #c3e88d">'intelligent'</span>,
  autoDocument: <span style="color: #f78c6c">true</span>,
  cleanCode: <span style="color: #f78c6c">true</span>
}));

<span style="color: #546e7a">// Khởi chạy kiến trúc phần mềm AI-Driven</span>
app.<span style="color: #82aaff">listen</span>(8080, () => {
  <span style="color: #ffcb6b">console</span>.<span style="color: #82aaff">log</span>(<span style="color: #c3e88d">'AI System is running.'</span>);
});</pre>
            </div>
        </div>
    </section>

    <!-- STATS -->
    <section class="section-mongo">
        <div class="container-mongo">
            <div class="stats-container">
                <div class="stat-mongo">
                    <strong>CRM</strong>
                    <span>Hệ thống Loyalty</span>
                </div>
                <div class="stat-mongo">
                    <strong>BKG</strong>
                    <span>Quản lý Booking</span>
                </div>
                <div class="stat-mongo">
                    <strong>QC</strong>
                    <span>Kiểm soát chất lượng</span>
                </div>
                <div class="stat-mongo">
                    <strong>100%</strong>
                    <span>Bảo mật dữ liệu</span>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="final-mongo">
        <div class="container-mongo">
            <h2>Sẵn sàng kiến tạo <br>năng lực số?</h2>
            <p>Khám phá cách công nghệ và trí tuệ nhân tạo có thể tối ưu hóa vận hành, cắt giảm chi phí cho doanh nghiệp của bạn một cách bền vững.</p>
            <button class="btn-mongo btn-mongo-primary" onclick="openModal('Khác')" style="padding: 18px 48px; font-size: 1.125rem;">Liên hệ Chuyên gia ngay</button>
        </div>
    </section>

    @include('partials.footer')
    @include('partials.modal')

</body>
</html>
