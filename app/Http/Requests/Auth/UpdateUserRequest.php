<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

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
                'required',
                'email',
                'unique:users,email',
            ],
            'password' => [
                // 'required',
                'min:8',
                'max:20',
                'confirmed',
            ],
            'name' => [
                'required',
                'string',
                'between:6,255'
            ]
        ];
    }
}
