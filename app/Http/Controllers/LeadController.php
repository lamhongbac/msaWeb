<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Http; // Dùng để gọi API Zalo

class LeadController extends Controller
{
    // Hàm lưu dữ liệu từ Landing Page
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
            'company'  => 'required|string|max:255',
        ]);

        $lead = Lead::create($request->all());

        // GỌI HÀM GỬI ZALO Ở ĐÂY
        $this->sendZaloNotification($lead);

        return back()->with('success', 'Cảm ơn Anh/Chị! Yêu cầu tư vấn đã được ghi nhận.');
    }

    // --- CÁC HÀM XÁC THỰC ADMIN (SUPER KEY) ---
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate(['super_key' => 'required|string']);
        
        // Đọc Super Key từ file .env, nếu không có mặc định là 'msapptech@123'
        $expectedKey = env('ADMIN_SUPER_KEY', 'msapptech@123');

        if ($request->super_key === $expectedKey) {
            session(['super_admin' => true]);
            return redirect('/admin/leads')->with('success', 'Đăng nhập thành công!');
        }

        return back()->with('error', 'Super Key không hợp lệ!');
    }

    public function logout()
    {
        session()->forget('super_admin');
        return redirect('/admin/login')->with('success', 'Đã đăng xuất!');
    }

    // --- CÁC HÀM QUẢN LÝ LEADS ---
    // Hàm hiển thị trang Admin
    public function index(Request $request)
    {
        $query = Lead::query();

        // 1. Lọc theo trạng thái xử lý
        if ($request->has('status') && $request->status !== 'all' && !is_null($request->status)) {
            $query->where('is_read', $request->status);
        }

        // 2. Lọc theo dịch vụ quan tâm
        if ($request->has('category') && $request->category !== 'all' && !is_null($request->category)) {
            $query->where('category', $request->category);
        }

        // 3. Tìm kiếm (theo số ĐT, tên, bài toán, dịch vụ)
        if ($request->has('search') && !is_null($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('fullname', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('problem', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        // Lấy danh sách khách hàng, sắp xếp mới nhất lên đầu, dùng paginate thay vì get
        $leads = $query->orderBy('created_at', 'desc')->paginate(50)->appends($request->all());
        
        // Lấy danh sách các dịch vụ đã có trong DB để đưa vào bộ lọc
        $categories = Lead::select('category')->whereNotNull('category')->where('category', '!=', '')->distinct()->pluck('category');

        return view('admin', compact('leads', 'categories'));
    }

    // Hàm đánh dấu đã đọc
    public function markAsRead($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->update(['is_read' => true]);
        return back()->with('success', 'Đã đánh dấu đọc tin nhắn của ' . $lead->fullname);
    }

    // 4. Hàm giao tiếp với Zalo API
    private function sendZaloNotification1($lead)
    {
        $accessToken = 'AXyLI91hD00l7Hb0bMu_0ouH4akNUJHvAWyHQS0BQa8lEnbSmr0yH39P647jM5f47cyPK_LWFdOiRdXVod8LNmTMSdVuKIbG1IDqQUieAcijDrHEd2C24Yq8KrRf83Tk6ZbCRTH8QMG8MqGcjrDfEGzl4nlhM4qlMaGFAePoTIf4HmvleqPEPsyn7rgv83nFUnL9MQKoQbvPDIeVlmDS0rS3FKMT77rS8ZTGMVaGQHiHC1edgHbO8Mad626O4KTdMWWWIQeX3Mf23tn9_X41QYPX8ohB5WKiSZjE1uWJ85ja0b59WJu90JurVm3G55qmC3O_08y1PYDE5rymdZqgUIOwHZxV91mjDm5dDOeTHJHmD3PqOOb6576NTp8B';
        $adminUserId = '7223050807139948731';

        $message = "🎉 KHÁCH HÀNG MỚI ĐĂNG KÝ TƯ VẤN AI:\n"
                 . "👤 Tên: {$lead->fullname}\n"
                 . "📱 SĐT: {$lead->phone}\n"
                 . "🏢 Đơn vị: {$lead->company}\n"
                 . "🏷️ Dịch vụ: " . ($lead->category ?? 'Không rõ') . "\n"
                 . "❓ Vấn đề: {$lead->problem}";

        try {
            Http::withHeaders([
                'access_token' => $accessToken,
                'Content-Type' => 'application/json'
            ])->post('https://openapi.zalo.me/v3.0/oa/message/cs', [
                'recipient' => ['user_id' => $adminUserId],
                'message'   => ['text' => $message]
            ]);
        } catch (\Exception $e) {
            \Log::error('Zalo API Error: ' . $e->getMessage());
        }
    }
    private function sendZaloNotification($lead)
    {
        try {
            $jsonPath = base_path('zalo_receivers.json');
            if (!file_exists($jsonPath)) return;
            
            $config = json_decode(file_get_contents($jsonPath), true);
            $accessToken = $config['access_token'] ?? '';
            $receivers = $config['receivers'] ?? [];

            if (empty($receivers)) return;

            $categoryName = $lead->category ?? 'TƯ VẤN AI';
            $dynamicTitle = mb_strtoupper($categoryName, 'UTF-8');

            $message = "🎉 KHÁCH HÀNG MỚI ĐĂNG KÝ: {$dynamicTitle}\n"
                     . "👤 Tên: {$lead->fullname}\n"
                     . "📱 SĐT: {$lead->phone}\n"
                     . "🏢 Đơn vị: {$lead->company}\n"
                     . "🏷️ Dịch vụ: " . ($lead->category ?? 'Không rõ') . "\n"
                     . "❓ Vấn đề: {$lead->problem}";

            // Flag to track if we already tried refreshing the token
            $hasRefreshed = false;

            foreach ($receivers as $userId) {
                retry_send:
                $response = Http::withHeaders([
                    'access_token' => $accessToken,
                    'Content-Type' => 'application/json'
                ])->post('https://openapi.zalo.me/v3.0/oa/message/cs', [
                    'recipient' => ['user_id' => $userId],
                    'message'   => ['text' => $message]
                ]);

                $resData = $response->json();

                // Zalo Error -216 or -124 usually means token is expired/invalid
                if (isset($resData['error']) && in_array($resData['error'], [-216, -124]) && !$hasRefreshed) {
                    \Log::info('Zalo Access Token expired. Attempting to refresh...');
                    
                    $newConfig = $this->refreshZaloToken($config, $jsonPath);
                    if ($newConfig) {
                        $config = $newConfig;
                        $accessToken = $config['access_token'];
                        $hasRefreshed = true;
                        goto retry_send; // Retry sending with new token
                    }
                }

                if ($response->failed() || (isset($resData['error']) && $resData['error'] !== 0)) {
                    \Log::error('Zalo API Request Failed for user ' . $userId, ['response' => $resData]);
                } else {
                    \Log::info('Zalo API Success for user ' . $userId);
                }
            }
        } catch (\Exception $e) {
            \Log::error('Zalo API Error: ' . $e->getMessage(), [
                'lead_id' => $lead->id ?? null,
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    private function refreshZaloToken($config, $jsonPath)
    {
        try {
            $response = Http::asForm()->withHeaders([
                'secret_key' => $config['secret_key'] ?? ''
            ])->post('https://oauth.zaloapp.com/v4/oa/access_token', [
                'app_id' => $config['app_id'] ?? '',
                'grant_type' => 'refresh_token',
                'refresh_token' => $config['refresh_token'] ?? ''
            ]);

            $data = $response->json();

            if ($response->successful() && isset($data['access_token'])) {
                $config['access_token'] = $data['access_token'];
                $config['refresh_token'] = $data['refresh_token'];
                file_put_contents($jsonPath, json_encode($config, JSON_PRETTY_PRINT));
                \Log::info('Zalo Token Refreshed Successfully.');
                return $config;
            }

            \Log::error('Zalo Token Refresh Failed', ['response' => $data]);
            return false;
        } catch (\Exception $e) {
            \Log::error('Zalo Token Refresh Error: ' . $e->getMessage());
            return false;
        }
    }

    // --- CÁC HÀM QUẢN LÝ QUA GIAO DIỆN ADMIN ---

    // 1. Hiển thị form cấu hình Zalo
    public function settings()
    {
        $jsonPath = base_path('zalo_receivers.json');
        $config = file_exists($jsonPath) ? json_decode(file_get_contents($jsonPath), true) : [];
        
        return view('admin.settings', compact('config'));
    }

    // 2. Lưu cập nhật cấu hình Zalo
    public function updateSettings(Request $request)
    {
        $jsonPath = base_path('zalo_receivers.json');
        
        // Tiền xử lý list receivers từ chuỗi ngăn cách bởi dấu phẩy
        $receiversRaw = $request->input('receivers', '');
        $receiversArray = array_filter(array_map('trim', explode(',', $receiversRaw)));

        $newConfig = [
            'app_id' => $request->input('app_id', ''),
            'secret_key' => $request->input('secret_key', ''),
            'access_token' => $request->input('access_token', ''),
            'refresh_token' => $request->input('refresh_token', ''),
            'receivers' => array_values($receiversArray)
        ];

        file_put_contents($jsonPath, json_encode($newConfig, JSON_PRETTY_PRINT));

        return back()->with('success', 'Đã lưu cấu hình Zalo thành công!');
    }

    // 3. Đọc và hiển thị System Logs
    public function logs()
    {
        $logPath = storage_path('logs/laravel.log');
        $logs = '';

        if (file_exists($logPath)) {
            // Đọc log mới nhất lên đầu nếu file không quá lớn
            $logs = file_get_contents($logPath);
            // Có thể dùng array_reverse(explode("\n", $logs)) để đảo ngược, nhưng raw log là đủ để debug
        }

        return view('admin.logs', compact('logs'));
    }

    // 4. Xóa System Logs
    public function clearLogs()
    {
        $logPath = storage_path('logs/laravel.log');
        
        if (file_exists($logPath)) {
            file_put_contents($logPath, ''); // Xóa trắng file log
        }

        return back()->with('success', 'Đã xóa toàn bộ Logs hệ thống!');
    }
}
