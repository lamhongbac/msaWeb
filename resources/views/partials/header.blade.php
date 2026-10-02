<style>
/* ANNOUNCEMENT BAR */
.announcement-bar {
    background-color: #1f5257; /* SAOMAI Dark Teal */
    color: #ffffff;
    padding: 10px 20px;
    font-size: 14px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    font-family: 'Inter', system-ui, sans-serif;
    letter-spacing: 0.2px;
}
.announcement-badge {
    background-color: #e97f32; /* SAOMAI Orange Accent */
    color: #ffffff;
    font-size: 11px;
    font-weight: 800;
    padding: 3px 10px;
    border-radius: 99px;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.announcement-text {
    font-weight: 500;
}
.announcement-link {
    color: #ffffff;
    text-decoration: underline;
    text-underline-offset: 4px;
    font-weight: 600;
    transition: opacity 0.2s;
}
.announcement-link:hover {
    opacity: 0.8;
}
@media(max-width: 768px) {
    .announcement-bar {
        flex-direction: column;
        text-align: center;
        gap: 8px;
        padding: 12px 20px;
    }
}

/* HEADER & NAVBAR STYLES */
nav {
    background: rgba(255, 255, 255, 0.98) !important;
    backdrop-filter: blur(10px) !important;
    -webkit-backdrop-filter: blur(10px) !important;
    border-bottom: 1px solid #d2dedf !important;
    box-shadow: none !important;
}
.logo { 
    color: #112a2d !important;
    font-family: 'Inter', system-ui, sans-serif !important;
    font-weight: 800 !important; 
}
.navlinks a {
    color: #112a2d !important;
    font-family: 'Inter', system-ui, sans-serif !important;
    font-weight: 700 !important;
    font-size: 15px !important;
    position: relative;
    padding-bottom: 4px;
    text-decoration: none !important;
    transition: color 0.3s ease !important;
}
.navlinks a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: 0;
    left: 0;
    background-color: #e97f32; /* Match the CTA button or Mongo Green (#368187) */
    transition: width 0.3s ease;
}
.navlinks a:hover, .navlinks a:focus {
    color: #e97f32 !important; /* Changed to SAOMAI orange to make it pop */
    outline: none;
}
.navlinks a:hover::after, .navlinks a:focus::after {
    width: 100%;
}
.navcta {
    border: none !important;
    color: #ffffff !important;
    border-radius: 6px !important;
    font-family: 'Inter', system-ui, sans-serif !important;
    font-weight: 600 !important;
    padding: 10px 24px !important;
    background: #e97f32 !important; /* SAOMAI Orange */
    transition: all 0.2s ease !important;
    cursor: pointer !important;
}
.navcta:hover {
    background: #cf681f !important;
    color: #ffffff !important;
    box-shadow: 0 4px 12px rgba(233, 127, 50, 0.2) !important;
    transform: translateY(-2px);
}
</style>

<!-- TOP ANNOUNCEMENT BAR -->
<div class="announcement-bar">
    <span class="announcement-badge">NEW</span>
    <span class="announcement-text">
        Chính thức ra mắt: Giải pháp thuê ngoài Giám đốc CĐS (C-Level) tối ưu chi phí. 
        <a href="{{ url('/#it-audit') }}" class="announcement-link">Tìm hiểu thêm ></a>
    </span>
</div>

<nav>
    <div class="container navin">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="MS-Apptech Logo" style="height: 48px;">
        </a>
        <div class="navlinks">
            <a href="{{ url('/#it-audit') }}">Giám đốc CĐS</a>
            <a href="{{ route('course.fnb') }}">AI F&B</a>
            <a href="{{ url('/#software') }}">Phần mềm</a>
        </div>
        <button class="navcta" onclick="openModal()">Liên Hệ Tư Vấn</button>
    </div>
</nav>
