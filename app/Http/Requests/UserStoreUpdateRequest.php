<?php

namespace App\Http\Requests;


use Illuminate\Validation\Rule;

class UserStoreUpdateRequest extends UserUpdateRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20|confirmed',
            'password_confirmation' => 'required|min:6|max:20',
            'is_admin' => 'sometimes|bool',
        ];
    }
}
