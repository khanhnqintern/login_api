<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $roles)
    {
        // Kiểm tra xem người dùng có đăng nhập không
        if (!$request->user()) {
            return redirect()->route('checklLogin');
        }

        // Nếu người dùng là 'admin', cho phép truy cập
        if ($request->user()->role === 'admin') {
            return $next($request);
        }

        // Nếu người dùng là 'store'
        if ($request->user()->role === 'store') {
            // Nếu người dùng đang cố gắng cập nhật thông tin của chính họ, cho phép truy cập
            if ($request->user()->id == $request->route('id')) {
                return $next($request);
            }

            // Kiểm tra xem người dùng là 'store' có quyền chỉnh sửa thông tin của staff không
            $user = User::find($request->route('id'));
            if ($user->role === 'staff') {
                return $next($request);
            }
        }

        // Nếu người dùng là 'admin' hoặc 'store', hoặc không có quyền truy cập
        if ($request->user()->role !== 'staff' || $request->user()->id != $request->route('id')) {
            return redirect()->route('checkQuyen');
        }

        // Chuyển đổi chuỗi các vai trò thành mảng
        $allowedRoles = explode(',', $roles);

        // Kiểm tra vai trò của người dùng
        if (!in_array($request->user()->role, $allowedRoles)) {
            return redirect()->route('checkQuyen');
        }

        return $next($request);
    }
}
