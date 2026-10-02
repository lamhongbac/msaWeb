@extends('layouts.app')

@section('title', config('seo.title_fnb'))

@section('meta')
    <meta name="description" content="{{ config('seo.desc_fnb') }}">
    <meta name="keywords" content="{{ config('seo.keys_fnb') }}">
    <meta property="og:title" content="{{ config('seo.title_fnb') }}">
    <meta property="og:description" content="{{ config('seo.desc_fnb') }}">
    <meta property="og:type" content="website">
@endsection

@section('content')
    <!-- Khối Hero Banner -->
    <header class="container hero">
        <div>
            <div class="eyebrow"><span class="dot"></span> AI • F&B • PRACTICAL TRANSFORMATION</div>
            <h1>Đừng chỉ <em>học AI.</em><br>Hãy biến AI thành năng lực vận hành.</h1>
            <p>Chương trình dành cho những người muốn đưa AI ra khỏi màn hình chat và đi thẳng vào các bài toán thật của nhà hàng: Food Cost, tồn kho, nhân sự, khiếu nại, HACCP, báo cáo và Marketing.</p>
            <div class="ctas">
                <button class="btn primary" onclick="openModal('Đào tạo AI ngành F&B')">ĐĂNG KÝ TƯ VẤN LỘ TRÌNH →</button>
                <a class="btn secondary" href="#problems">Khám phá 10 bài toán AI</a>
            </div>
        </div>
        <div class="hero-graphic" aria-label="AI kết nối các phòng ban F&B">
            <div class="orbit"></div><div class="orbit2"></div>
            <div class="core">AI<br>F&B<br>ENGINE</div>
            <div class="node n1"><b>🍳 Bếp</b>Food Cost</div>
            <div class="node n2"><b>🧑‍🍳 Sảnh</b>Service</div>
            <div class="node n3"><b>📣 MKT</b>Campaign</div>
            <div class="node n4"><b>👥 HR</b>People</div>
        </div>
    </header>

    <!-- Khối Sự khác biệt -->
    <section class="section dark" id="why">
        <div class="container">
            <div class="sectionhead">
                <div class="kicker">From theory → to business impact</div>
                <h2>Từ học thuật đến thực chiến.</h2>
                <p class="lead">Không học AI để biết thêm một công cụ. Học để nhìn thấy một vấn đề trong doanh nghiệp và biết cách thiết kế lời giải bằng AI.</p>
            </div>
            <div class="difference">
                <div class="card">
                    <div class="num">01 / EXPERT</div>
                    <h3>Học từ người đã vận hành hệ thống F&B</h3>
                    <p>Được dẫn dắt bởi chuyên gia từng quản trị hệ thống tại KFC & Golden Gate, hiểu các nút thắt vận hành và cách AI can thiệp.</p>
                </div>
                <div class="card">
                    <div class="num">02 / 20—80</div>
                    <h3>20% lý thuyết — 80% thực hành</h3>
                    <p>Bài tập bám sát nghiệp vụ Bếp, Thu mua, Vận hành, Nhân sự và Marketing thay vì lý thuyết sáo rỗng.</p>
                </div>
                <div class="card">
                    <div class="num">03 / TRANSFER</div>
                    <h3>Mang bài toán thật vào lớp — mang giải pháp về doanh nghiệp</h3>
                    <p>Cùng phân tích bài toán thực tế và xây quy trình, Prompt, trợ lý AI phù hợp với chính doanh nghiệp của bạn.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Khối Triết lý đào tạo & Luồng chuyển giao -->
    <section class="section">
        <div class="container split">
            <div>
                <div class="kicker">Learning philosophy</div>
                <h2>Mỗi bài học phải tạo ra một thứ có thể dùng được.</h2>
                <p class="lead">Từ dữ liệu và vấn đề → tư duy AI → Prompt → trợ lý chuyên biệt → quy trình vận hành → chuyển giao.</p>
            </div>
            <div class="flow">
                <div class="step"><div class="icon">🎯</div><b>Bài toán thật</b></div><div class="arrow">→</div>
                <div class="step"><div class="icon">🧠</div><b>Tư duy AI</b></div><div class="arrow">→</div>
                <div class="step"><div class="icon">⚙️</div><b>Giải pháp</b></div><div class="arrow">→</div>
                <div class="step"><div class="icon">🚀</div><b>Chuyển giao</b></div>
            </div>
        </div>
    </section>

    <!-- Khối 10 Bài toán cốt lõi -->
    <section class="section dark" id="problems">
        <div class="container">
            <div class="sectionhead">
                <div class="kicker">10 real F&B problems</div>
                <h2>AI sẽ giúp bạn giải quyết chuyện gì?</h2>
                <p class="lead">Đây không phải danh sách tính năng AI. Đây là 10 nhóm bài toán vận hành mà chương trình tập trung xử lý.</p>
            </div>
            <div class="problems">
                <div class="problem"><div class="pnum">01</div><div><b>Food Cost</b><span>Tính giá vốn, định giá menu, tối ưu định lượng.</span></div></div>
                <div class="problem"><div class="pnum">02</div><div><b>Zero Waste</b><span>Kiểm soát tồn kho cận date, Special of the Day.</span></div></div>
                <div class="problem"><div class="pnum">03</div><div><b>Procurement</b><span>So sánh báo giá, công nợ và chính sách đổi trả.</span></div></div>
                <div class="problem"><div class="pnum">04</div><div><b>Smart Staffing</b><span>Định biên và xếp ca theo năng suất, giờ cao điểm.</span></div></div>
                <div class="problem"><div class="pnum">05</div><div><b>Customer Crisis</b><span>Phản hồi đánh giá 1 sao và tạo checklist giao ca.</span></div></div>
                <div class="problem"><div class="pnum">06</div><div><b>Food Safety</b><span>Đối chiếu quy trình với chuẩn HACCP.</span></div></div>
                <div class="problem"><div class="pnum">07</div><div><b>Ops Reporting</b><span>Biến tin nhắn giao ca thành E-Checklist chuẩn hóa.</span></div></div>
                <div class="problem"><div class="pnum">08</div><div><b>People Analytics</b><span>Phân tích nguyên nhân biến động nhân sự ẩn danh.</span></div></div>
                <div class="problem"><div class="pnum">09</div><div><b>AI Onboarding</b><span>Biến SOP thành Quiz, Flashcard, Audio Overview.</span></div></div>
                <div class="problem"><div class="pnum">10</div><div><b>Low-hour Marketing</b><span>Combo kích cầu, TikTok và lời mời cá nhân hóa.</span></div></div>
            </div>
            <div class="ctas" style="justify-content:center;margin-top:38px">
                <button class="btn primary" onclick="openModal('Đào tạo AI ngành F&B')">Tôi muốn giải quyết bài toán của mình →</button>
            </div>
        </div>
    </section>

    <!-- Khối Lộ trình môn học -->
    <section class="section" id="subjects">
        <div class="container">
            <div class="sectionhead">
                <div class="kicker">5 learning modules</div>
                <h2>Lộ trình từ người dùng AI đến người xây hệ thống AI.</h2>
                <p class="lead">Các chuyên đề được thiết kế linh hoạt để có thể tinh chỉnh theo lịch vận hành của doanh nghiệp.</p>
            </div>
            <div class="subjects">
                <div class="subject"><div class="sicon">🧭</div><h3>01. AI Foundation</h3><p>Generative AI, Agentic AI, LLM và khung giao tiếp CREATE.</p></div>
                <div class="subject"><div class="sicon">✍️</div><h3>02. Advanced Prompting</h3><p>Chống ảo giác, Self-Criticism, Few-Shot và ẩn danh dữ liệu.</p></div>
                <div class="subject"><div class="sicon">🤖</div><h3>03. Build GEMs</h3><p>Đóng gói quy trình thành trợ lý AI chuyên biệt cho từng phòng ban.</p></div>
                <div class="subject"><div class="sicon">🧠</div><h3>04. Knowledge AI</h3><p>NotebookLM, Grounded AI, FAQ, Briefing và Audio Overview.</p></div>
                <div class="subject"><div class="sicon">🛠️</div><h3>05. Real Practice</h3><p>Thực hành bài toán F&B, xây Prompt, chính sách, quy trình và quản lý dự án.</p></div>
            </div>
        </div>
    </section>

    <!-- Khối Thông tin lớp học & Đặc quyền -->
    <section class="section dark" id="details">
        <div class="container">
            <div class="stats">
                <div class="stat"><strong>6</strong><span>Học viên tối đa / lớp</span></div>
                <div class="stat"><strong>16h</strong><span>Học thực chiến</span></div>
                <div class="stat"><strong>20/80</strong><span>Lý thuyết / thực hành</span></div>
                <div class="stat"><strong>10M+</strong><span>VNĐ / lớp</span></div>
            </div>
            <div class="sectionhead" style="margin-top:70px;margin-bottom:30px">
                <div class="kicker">Beyond the classroom</div>
                <h2>Học xong không để đó.</h2>
                <p class="lead">Các giải pháp được xây dựng trong lớp được chuyển giao để doanh nghiệp có thể tiếp tục đưa vào luồng công việc hiện tại.</p>
            </div>
            <div class="bonus">
                <div class="card"><span class="tag">TRANSFER</span><h3>Bộ giải pháp AI của chính doanh nghiệp</h3><p>Công thức, GEM và Prompt được xây dựng trong lớp có thể mang về áp dụng.</p></div>
                <div class="card"><span class="tag">SUPPORT</span><h3>Đồng hành triển khai</h3><p>Hỗ trợ tháo gỡ khó khăn online qua nhóm Zalo trong quá trình vận hành thực tế.</p></div>
                <div class="card"><span class="tag">DEBUG</span><h3>Sổ tay “Debugging Prompt”</h3><p>Bí kíp giúp quản lý xử lý nhanh khi AI cho kết quả sai lệch hoặc tính toán sai định mức.</p></div>
            </div>
        </div>
    </section>

    <!-- Khối Chốt Sale Cuối Trang -->
    <section class="final">
        <div class="container finalbox">
            <div class="kicker">Your business. Your problem. Your AI.</div>
            <h2>Đừng hỏi “AI làm được gì?”<br><em style="color:var(--lime)">Hãy hỏi “AI giải được gì cho tôi?”</em></h2>
            <p>Mang một bài toán thật của nhà hàng. Chúng ta cùng phân tích và xác định lộ trình học phù hợp.</p>
            <button class="btn primary" onclick="openModal('Đào tạo AI ngành F&B')">ĐĂNG KÝ TƯ VẤN LỘ TRÌNH →</button>
            <p style="font-size:12px;margin-top:22px">Tư vấn viên liên hệ qua SĐT/Zalo trong vòng 24h.</p>
        </div>
    </section>

    @include('partials.modal')

@endsection

