<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\RegisterUserService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthControler extends Controller
{

    public function register(RegisterRequest $request)
    {
        $result = resolve(RegisterUserService::class)->setParams($request->validated())->handle();

        if (!$result) {
            return $this->responseErrors('Không thể đăng ký người dùng');
        }

        return $this->responseSuccess([
            'user' => $result,
            'message' => 'Đăng ký thành công',
        ]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (!$token = Auth::attempt($credentials)) {
            return $this->responseErrors('Không được phép', Response::HTTP_UNAUTHORIZED);
        }

        return $this->responseSuccess([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }

    public function logout()
    {
        try {
            auth()->logout();

            return response()->json(['message' => 'Người dùng đã đăng xuất thành công']);
        } catch (Exception $e) {
            Log::error("đăng xuất thất bại", ['result' => $e->getMessage()]);

            return $this->responseErrors('Không thể đăng ký người dùng');
        }
    }

}
