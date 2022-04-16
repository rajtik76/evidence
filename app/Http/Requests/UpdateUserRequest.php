<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->route('user')->id)],
            'password' => 'nullable|min:6|max:20|confirmed',
            'password_confirmation' => 'nullable|min:6|max:20',
            'is_admin' => 'sometimes|bool',
        ];
    }
}
