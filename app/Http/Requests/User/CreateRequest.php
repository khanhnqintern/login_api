<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends BaseRequest
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
                'unique:users,email',
            ],
            'password' => [
                'required',
                'min:8',
                'max:20',
                'regex:/^\S*$/',
            ],
            'name' => [
                'required',
                'string',
                'between:6,255'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => "Name không được bỏ trống!",
            'name.string'           => "Name không đúng định dạng!",
            'name.between'          => "Name từ 6 đến 255 ký tự",
            'email.required'        => "Email không được để trống!",
            'email.email'           => "Email không đúng định dạng!",
            'email.unique'          => "Email đã tồn tại!",
            'password.min'          => "Mật khẩu phải từ 8 ký tự trở lên!",
            'password.max'          => "Mật khẩu phải từ 20 ký tự trở xuống!",
            'password.regex'        => "Mật khẩu không chứa khoảng trắng!",
        ];
    }
}
