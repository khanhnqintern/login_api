<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // Kiểm tra xem người dùng có đăng nhập không
        if (!$request->user()) {
            return response()->json(['Lỗi' => 'Chưa đăng nhập!'], 401);
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

        // Nếu người dùng là 'staff'
        if ($request->user()->role !== 'staff' || $request->user()->id != $request->route('id')) {
            return response()->json(['Lỗi' => 'Không có quyền truy cập'], 403);
        }

        // Chuyển đổi chuỗi các vai trò thành mảng
        $allowedRoles = explode(',', $roles);

        // Kiểm tra vai trò của người dùng
        if (!in_array($request->user()->role, $allowedRoles)) {
            return response()->json(['Lỗi' => 'Không có quyền truy cập'], 403);
        }

        return $next($request);
    }
}
