<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
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
                'required',
                'email',
            ],
            'password' => [
                'required',
                'min:8',
                'max:20',
                'regex:/^\S*$/',
            ],
        ];
    }
    public function messages()
    {
        return [
            'email.required'        => "Email không được để trống!",
            'email.email'           => "Email không đúng định dạng!",
            'password.required'     => "Mật khẩu không được bỏ trống!",
            'password.min'          => "Mật khẩu phải từ 8 ký tự trở lên!",
            'password.max'          => "Mật khẩu phải từ 20 ký tự trở xuống!",
            'password.regex'        => "Mật khẩu không chứa khoảng trắng!",
        ];
    }
}
