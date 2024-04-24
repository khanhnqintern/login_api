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
            'name'          => 'required|string',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => "Name không được bỏ trống!",
            'name.string'           => "Name không đúng định dạng!",
            'email.required'        => "Email không được để trống!",
            'email.email'           => "Email không đúng định dạng!",
            'email.unique'          => "Email đã tồn tại!",
            'password.min'          => "Mật khẩu phải từ 6 ký tự trở lên!",
        ];
    }
}
