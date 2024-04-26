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
            'email' => [
                'sometimes',
                'email',
                'unique:users,email',
            ],
            'password' => [
                'sometimes',
                'min:8',
                'max:20',
                'regex:/^\S*$/',
            ],
            'name' => [
                'sometimes',
                'string',
                'between:6,255'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.string'           => "Name không đúng định dạng!",
            'name.between'          => "Name từ 6 đến 255 ký tự",
            'email.email'           => "Email không đúng định dạng!",
            'email.unique'          => "Email đã tồn tại!",
            'password.min'          => "Mật khẩu phải từ 8 ký tự trở lên!",
            'password.max'          => "Mật khẩu phải từ 20 ký tự trở xuống!",
            'password.regex'        => "Mật khẩu không chứa khoảng trắng!",
        ];
    }
}
