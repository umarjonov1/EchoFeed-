<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
//        dd($this->email);

        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This fill is required',
            'name.string' => 'Name must be string',
            'email.string' => 'This fill is required',
            'email.email' => 'Name must be string',
            'email.unique' => 'User with this email is exists',
            'password.required' => 'This fill is required',

        ];
    }
}
