<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashierStoreRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profile' => 'image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'address' => 'required|string',
            'outlet_id' => 'required|exists:outlets,id',
        ];
    }
}
