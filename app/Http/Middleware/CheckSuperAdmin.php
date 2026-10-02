<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSuperAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('super_admin')) {
            return redirect()->route('admin.login')->with('error', 'Vui lòng nhập Super Key để truy cập.');
        }
        return $next($request);
    }
}
