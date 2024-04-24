<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'                => 'exists:admins,id',
            'name'              => 'sometimes|string',
            'email'             => 'sometimes|email|unique:users,email',
            'password'          => 'sometimes|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'id.*'                  => 'Users không tồn tại!',
            'name.required'         => "Name không được bỏ trống!",
            'name.string'           => "Name không đúng định dạng!",
            'email.email'           => "Email không đúng định dạng!",
            'email.unique'          => "Email đã tồn tại!",
            'password.min'          => "Mật khẩu phải từ 6 ký tự trở lên!",
        ];
    }
}
