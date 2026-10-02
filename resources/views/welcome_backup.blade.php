<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAOMAI - MS Apptech | Dẫn dắt chuyển đổi, Kiến tạo nền tảng</title>

    <!-- Tích hợp CSS trong Laravel bằng helper asset() -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- NAVBAR (THANH ĐIỀU HƯỚNG) -->
    @include('partials.header')

    <!-- HERO SECTION (PHẦN ĐẦU TRANG) -->
    <header class="hero container">
        <div>
            <div class="eyebrow"><div class="dot"></div> CÔNG NGHỆ & TRÍ TUỆ NHÂN TẠO</div>
            <h1>Dẫn dắt chuyển đổi<br><em>Kiến tạo nền tảng</em></h1>
            <p class="lead">Định hình lại tốc độ và chất lượng bằng AI. Phá bỏ sức ì trong tổ chức bằng tầm nhìn chiến lược và giải pháp thực thi đột phá.</p>
            <div class="ctas">
                <a href="#fnb" class="btn primary">Khám phá Khóa học AI F&B</a>
                <a href="#software" class="btn secondary">Tư vấn Phần mềm</a>
            </div>
        </div>

        <!-- Graphic động dựa trên style.css -->
        <div class="hero-graphic">
            <div class="orbit"></div>
            <div class="orbit2"></div>
            <div class="core">AI<br>CORE</div>
            <div class="node n1"><b>Tốc độ</b>x10</div>
            <div class="node n2"><b>Giảm lỗi</b>99%</div>
            <div class="node n3"><b>Bảo mật</b>Tuyệt đối</div>
            <div class="node n4"><b>Zero</b>Hallucination</div>
        </div>
    </header>

    <!-- DỊCH VỤ GIÁM ĐỐC CĐS & CNTT -->
    <section id="it-audit" class="section dark">
        <div class="container">
            <div class="sectionhead">
                <span class="kicker">TƯ VẤN CẤP CAO</span>
                <h2>Thuê Ngoài Giám Đốc CĐS & CNTT</h2>
                <p class="lead">Sở hữu tư duy của một Giám đốc Công nghệ (C-level) với chi phí chỉ bằng một phần nhỏ so với việc tuyển dụng toàn thời gian.</p>
                <div class="ctas" style="justify-content: center; margin-top: 20px;">
                    <button class="btn primary" onclick="openModal('Thuê Ngoài Giám Đốc CĐS & CNTT')">Đăng ký tư vấn</button>
                </div>
            </div>

            <div class="difference">
                <div class="card">
                    <div class="num">01</div>
                    <h3>IT & Digital Audit</h3>
                    <p>Khảo sát toàn diện hệ thống công nghệ, chỉ ra điểm nghẽn gây lãng phí chi phí vận hành.</p>
                </div>
                <div class="card">
                    <div class="num">02</div>
                    <h3>Digital Strategy</h3>
                    <p>Xây dựng lộ trình Chuyển đổi số 1-3 năm, ưu tiên các dự án mang lại hiệu suất (ROI) cao nhất.</p>
                </div>
                <div class="card">
                    <div class="num">03</div>
                    <h3>Vendor Management</h3>
                    <p>Đại diện doanh nghiệp đánh giá, lựa chọn và giám sát khắt khe các nhà cung cấp giải pháp.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- DỊCH VỤ ĐÀO TẠO AI F&B (TRỌNG TÂM) -->
    <section id="fnb" class="section">
        <div class="container split">
            <div>
                <span class="kicker">ĐÀO TẠO CHUYÊN SÂU</span>
                <h2>Đào tạo AI ngành F&B</h2>
                <p class="lead">Trang bị "Bộ não số" (Digital Brain) và tự động hóa tác nghiệp để tối ưu vận hành, cắt giảm chi phí cho chuỗi nhà hàng.</p>

                <div class="problems" style="margin-top: 30px;">
                    <div class="problem">
                        <div class="pnum">1</div>
                        <div>
                            <b>Zero-hallucination</b>
                            <span>Dùng NotebookLM nạp SOP để AI chỉ trích dẫn tài liệu chuẩn.</span>
                        </div>
                    </div>
                    <div class="problem">
                        <div class="pnum">2</div>
                        <div>
                            <b>Trợ lý ảo (GEM)</b>
                            <span>Thiết kế trợ lý riêng cho Bếp, Sảnh, Kho, Nhân sự.</span>
                        </div>
                    </div>
                    <div class="problem">
                        <div class="pnum">3</div>
                        <div>
                            <b>Audio Overview</b>
                            <span>Biến tài liệu giấy, văn bản dài thành dạng Podcast nghe nhanh.</span>
                        </div>
                    </div>
                    <div class="problem">
                        <div class="pnum">4</div>
                        <div>
                            <b>Kiến tạo Di sản</b>
                            <span>Bàn giao Thư viện Mega-Prompt chuẩn hóa độc quyền.</span>
                        </div>
                    </div>
                </div>

                <div class="ctas">
                    <!-- Link Route trong Laravel tới trang chi tiết -->
                    <a href="{{ route('course.fnb') }}" class="btn primary">Xem Chi Tiết Khóa Học &rarr;</a>
                    <button class="btn secondary" onclick="openModal('Đào tạo AI ngành F&B')">Đăng ký tư vấn</button>
                </div>
            </div>

            <div class="bonus">
                 <!-- Mô phỏng bảng thành phần hệ sinh thái của khoá học -->
                 <div class="card">
                    <h3>Self-Criticism</h3>
                    <p>Dạy AI tự soi lỗi trong báo cáo, đảm bảo văn phong tự nhiên không bị "robot".</p>
                 </div>
                 <div class="card" style="grid-column: span 2;">
                    <h3>Anonymization (Ẩn danh hóa)</h3>
                    <p>Mã hóa dữ liệu cá nhân (PII) và bí mật kinh doanh trước khi đưa lên hệ thống AI mở, đảm bảo bảo mật tuyệt đối.</p>
                 </div>
            </div>
        </div>
    </section>

    <!-- DỊCH VỤ PHÁT TRIỂN PHẦN MỀM -->
    <section id="software" class="section dark">
        <div class="container">
            <div class="sectionhead" style="margin: auto; text-align: center;">
                <span class="kicker">THỰC THI DỰ ÁN</span>
                <h2>Phát Triển Phần Mềm AI-Driven</h2>
                <p class="lead">Chúng tôi ứng dụng mô hình công nghệ phát triển phần mềm theo hướng AI, giúp doanh nghiệp sở hữu sản phẩm nhanh hơn và kế thừa dễ dàng hơn.</p>
                <div class="ctas" style="justify-content: center; margin-top: 20px;">
                    <button class="btn primary" onclick="openModal('Phát Triển Phần Mềm AI-Driven')">Đăng ký tư vấn</button>
                </div>
            </div>

            <div class="subjects" style="grid-template-columns: repeat(3, 1fr); margin-top: 40px;">
                <div class="subject">
                    <div class="sicon">📄</div>
                    <h3>Tự động hóa Tài liệu</h3>
                    <p>Tuân thủ BMAD framework. Ứng dụng MCP tự động sinh bộ tài liệu đặc tả hoàn chỉnh L0-L4, không phụ thuộc cá nhân.</p>
                </div>
                <div class="subject">
                    <div class="sicon">🤖</div>
                    <h3>AI Clean Code Agents</h3>
                    <p>Đội ngũ AI đóng vai trò như "trợ lý kiểm định", tăng tốc code, tự động rà soát giảm bug hiệu quả.</p>
                </div>
                <div class="subject">
                    <div class="sicon">🌐</div>
                    <h3>Công nghệ Đa nền tảng</h3>
                    <p>Phát triển .Net, React, ứng dụng di động Cross platform (Flutter) và Native (Android, Switch).</p>
                </div>
            </div>
        </div>
    </section>

    <!-- THỐNG KÊ / SẢN PHẨM HIỆN CÓ -->
    <section class="section">
        <div class="container">
            <div class="stats">
                <div class="stat">
                    <strong>CRM</strong>
                    <span>Hệ thống Loyalty & Giữ chân Khách hàng</span>
                </div>
                <div class="stat">
                    <strong>Booking</strong>
                    <span>Quản lý lịch trình theo thời gian thực</span>
                </div>
                <div class="stat">
                    <strong>QC</strong>
                    <span>Kiểm soát chất lượng, báo cáo tự động</span>
                </div>
                <div class="stat">
                    <strong>100%</strong>
                    <span>Cam kết bảo mật & Bảo trì dài hạn</span>
                </div>
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION CUỐI TRANG -->
    <section class="final">
        <div class="container finalbox">
            <span class="kicker">BẮT ĐẦU NGAY HÔM NAY</span>
            <h2>Sẵn sàng <em>chuyển đổi số</em> cùng SAOMAI?</h2>
            <p>Khám phá cách công nghệ và trí tuệ nhân tạo có thể tối ưu hóa vận hành, cắt giảm chi phí cho doanh nghiệp của bạn.</p>
            <div class="ctas" style="justify-content: center;">
                <button class="btn primary" onclick="openModal()">Yêu cầu Tư vấn Ngay</button>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    @include('partials.footer')

    @include('partials.modal')

</body>
</html>
