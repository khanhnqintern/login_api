<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Services\User\CreateUserService;
use App\Services\User\DeleteUserService;
use App\Services\User\GetUserService;
use App\Services\User\UpdateUserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function store(CreateRequest $request)
    {
        $user = resolve(CreateUserService::class)->setParams($request->validated())->handle();
        if (!$user) {
            return $this->responseErrors('Không thể tạo người dùng');
        }

        return $this->responseSuccess([
            'message' => 'Đăng ký thành công',
            'user' => $user,
        ]);
    }

    public function delete(int $id, Request $request)
    {
        $user = resolve(DeleteUserService::class)->setParams($request)->handle();
        if (!$user) {
            return $this->responseErrors('Không tìm thấy người dùng', Response::HTTP_NOT_FOUND);
        }

        return $this->responseSuccess([
            'message' => 'Xóa người dùng thành công',
        ]);
    }

    public function index(Request $request)
    {
        $user = resolve(GetUserService::class)->handle();
        return redirect()->route('users.index');
    }

    public function update(int $id, UpdateUserRequest $request)
    {
        $user = $request->validated();
        $user['id'] = $id;
        $user = resolve(UpdateUserService::class)->setParams($user)->handle();
        if (!$user) {
            return $this->responseErrors('Không tìm thấy người dùng', Response::HTTP_NOT_FOUND);
        }

        return $this->responseSuccess([
            'user' => $user,
            'message' => 'Cập nhật thành công',
        ]);
    }
}
