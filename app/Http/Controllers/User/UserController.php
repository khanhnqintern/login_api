<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\User\CreateUserService;
use App\Services\User\DeleteUserService;
use App\Services\User\GetUserService;
use App\Services\User\ShowIdUserService;
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
        $user = resolve(CreateUserService::class)->setParams($request->validated())->handle();
        if (!$user) {
            return $this->responseErrors(__('users.create_fail'));
        }

        return $this->responseSuccess([
            'message' => __('users.create_success'),
            'user' => $user,
        ]);
    }

    public function delete(Request $request, $id)
    {
        $users = resolve(DeleteUserService::class)->setParams($request)->handle();

        if (!$users) {
            return $this->responseErrors(__('users.delete_fail'));

        }

        return response()->json([
            'message' => __('users.delete_success'),
            'user' => $users,
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
            return $this->responseErrors(__('users.get_fail'));
        }

        return $this->responseSuccess([
            'message' => __('users.get_success'),
            'users' => $users,
        ]);
    }

    public function showUser($id)
    {
        $users = resolve(ShowIdUserService::class)->setParams($id)->handle();
        if (!$users) {
            return $this->responseErrors(__('users.showUser_fail'));
        }

        return $this->responseSuccess([
            'message' => __('users.showUser_success'),
            'users' => $users,
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $update = $request->validated();
        $update['id'] = $id;

        $users = resolve(UpdateUserService::class)->setParams($update)->handle();

        if (!$users) {
            return $this->responseErrors(__('users.update_fail'));
        }

        return response()->json([
            'message' => __('users.update_success'),
            'user' => $users,
        ]);
    }

    public function checkLogin()
    {
        return $this->responseErrors(__('users.check_login_fail'));
    }

    public function checkQuyen()
    {
        return $this->responseErrors(__('users.check_quyen_fail'));
    }
}
