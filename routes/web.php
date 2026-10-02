<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/course/fnb', function () {
    return view('course.fnb');
})->name('course.fnb');

use Illuminate\Http\Request;

// Route xử lý form đăng ký
Route::post('/submit-form', [LeadController::class, 'store']);

// Đăng nhập Admin
Route::get('/admin/login', [LeadController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [LeadController::class, 'login']);
Route::get('/admin/logout', [LeadController::class, 'logout']);

use App\Http\Middleware\CheckSuperAdmin;

// Các Route dành cho Admin (Được bảo vệ bằng Super Key)
Route::middleware([CheckSuperAdmin::class])->group(function () {
    Route::get('/admin/leads', [LeadController::class, 'index']);
    Route::post('/admin/leads/{id}/read', [LeadController::class, 'markAsRead']);

    Route::get('/admin/settings', [LeadController::class, 'settings']);
    Route::post('/admin/settings', [LeadController::class, 'updateSettings']);

    Route::get('/admin/logs', [LeadController::class, 'logs']);
    Route::post('/admin/logs/clear', [LeadController::class, 'clearLogs']);
});
