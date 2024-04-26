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

        //dd($request->validated());
        $result = resolve(RegisterUserService::class)->setParams($request->validated())->handle();

        if (!$result) {
            return $this->responseErrors(__('auth.register_fail'));
        }

        return $this->responseSuccess([
            'message' => __('auth.register_success'),
            'user' => $result,
        ]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (!$token = Auth::attempt($credentials)) {
            return $this->responseErrors(__('auth.login_fail'));
        }

        $user = auth()->user();
        return $this->responseSuccess([
            'message' => __('auth.login_success'),
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }

    public function logout()
    {
        try {
            auth()->logout();

            return response()->json(__('auth.logout_success'));
        } catch (Exception $e) {
            Log::error("đăng xuất thất bại", ['result' => $e->getMessage()]);

            return $this->responseErrors(__('auth.logout_fail'));
        }
    }

}
