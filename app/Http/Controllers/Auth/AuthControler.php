<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Services\Auth\RegisterUserService;
use App\Services\User\DeleteUserService;
use App\Services\User\GetUserService;
use App\Services\User\UpdateUserService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function getUser(GetUserService $getUserService)
    {
        // Lấy thông tin người dùng đã đăng nhập
        $user = auth()->user();

        if (!$user) {
            return $this->responseErrors('Không tìm thấy người dùng', Response::HTTP_NOT_FOUND);
        }

        // Trả về thông tin người dùng
        return $this->responseSuccess([
            'user' => $user,
        ]);
    }

    /**
     * update infomation for user
     * @param \App\Http\Requests\UpdateUserRequest $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, UpdateUserService $updateUserService)
    {
        $user = auth()->user();

        if (!$user) {
            return $this->responseErrors('Không tìm thấy người dùng', Response::HTTP_NOT_FOUND);
        }

        $userData = $request->validated();
        $userData['id'] = $user->id;
        $result = $updateUserService->handle($userData);

        if (!$result) {
            return $this->responseErrors('Không thể cập nhật thông tin người dùng');
        }

        // Trả về thông báo thành công
        return $this->responseSuccess([
            'message' => 'Cập nhật thông tin người dùng thành công',
        ]);
    }

    public function delete($id)
    {
        $check = resolve(DeleteUserService::class)->setParams($id)->handle();

        if ($check) {
            return $this->responseSuccess([
                'message' => __('Xóa thành công'),
            ]);
        }

        return $this->responseErrors(__('Không thể xóa'));
    }
}
