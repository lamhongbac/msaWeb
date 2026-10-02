<div class="modal" id="modal">
  <div class="modalbox">
    <button class="close" onclick="closeModal()">×</button>
    <h3>Đăng ký tư vấn</h3>
    <p>Hãy cho chúng tôi biết vấn đề lớn nhất bạn muốn giải quyết.</p>
    <form action="/submit-form" method="POST">
    @csrf
    
    <label>Họ và tên *</label>
    <input name="fullname" required placeholder="Nguyễn Văn A">
    
    <label>Số điện thoại / Zalo *</label>
    <input name="phone" required type="tel" placeholder="09xx xxx xxx">
    
    <label>Đơn vị / Công ty *</label>
    <input name="company" required placeholder="Tên doanh nghiệp">

    <label>Dịch vụ quan tâm</label>
    <select name="category" id="modal-category" style="width: 100%; padding: 12px; margin-top: 5px; margin-bottom: 15px; border: 1px solid var(--border); border-radius: 8px; font-family: inherit; font-size: 15px;">
        <option value="Thuê Ngoài Giám Đốc CĐS & CNTT">Thuê Ngoài Giám Đốc CĐS & CNTT</option>
        <option value="Đào tạo AI ngành F&B">Đào tạo AI ngành F&B</option>
        <option value="Phát Triển Phần Mềm AI-Driven">Phát Triển Phần Mềm AI-Driven</option>
        <option value="Khác">Khác</option>
    </select>
    
    <label>Bài toán bạn muốn giải quyết</label>
    <textarea name="problem" placeholder="Ví dụ: Cải thiện hiệu suất phần mềm, chuyển đổi số..."></textarea>
    
    <button type="submit" class="btn primary" style="width:100%;margin-top:18px">GỬI ĐĂNG KÝ →</button>
    </form>
  </div>
  @if(session('success'))
    <div style="background: #2e7d32; color: white; padding: 15px; text-align: center; font-weight: bold; position: fixed; top: 0; width: 100%; z-index: 9999;">
        {{ session('success') }}
    </div>
  @endif
</div>

<!-- SCRIPT CHO MODAL -->
<script>
function openModal(category = '') {
    if(category) {
        let select = document.getElementById('modal-category');
        if(select) {
            select.value = category;
        }
    }
    document.getElementById('modal').classList.add('open');
}
function closeModal(){document.getElementById('modal').classList.remove('open')}
document.getElementById('modal').addEventListener('click',e=>{if(e.target.id==='modal')closeModal()});
</script>
