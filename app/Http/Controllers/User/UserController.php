<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\User\CreateUserService;
use App\Services\User\DeleteUserService;
use App\Services\User\GetUserService;
use App\Services\User\UpdateUserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return HttpResponse
     */
    public function store(CreateRequest $request)
    {
        //dd($request);
        $user = resolve(CreateUserService::class)->setParams($request->validated())->handle();
        if (!$user) {
            return $this->responseErrors('Không thể tạo người dùng');
        }

        return $this->responseSuccess([
            'message' => 'Thêm người dùng thành công',
            'user' => $user,
        ]);
    }

    public function delete(Request $request, $id)
    {
        $users = resolve(DeleteUserService::class)->setParams($request)->handle();

        if (!$users) {
            return response()->json(['error' => 'Không tìm thấy người dùng']);
        }

        return response()->json([
            'user' => $users,
            'message' => 'Xóa người dùng thành công'
        ]);

    }


    /**
     * Get a listing of the resource.
     *
     * @return HttpResponse
     */
    public function index(Request $request)
    {
        $users = resolve(GetUserService::class)->handle();
        if (!$users) {
            return $this->responseErrors('Lỗi hiển thị người dùng');
        }

        return $this->responseSuccess([
            'users' => $users,
            'message' => 'danh sách người dùng',
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        //dd($request->validated());
        $update = $request->validated();
        $update['id'] = $id;

        $users = resolve(UpdateUserService::class)->setParams($update)->handle();

        if (!$users) {
            return response()->json(['error' => 'Không tìm thấy người dùng']);
        }

        return response()->json([
            'user' => $users,
            'message' => 'Cập nhật người dùng thành công'
        ]);
    }
}
