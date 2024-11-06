<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOutletRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "owner_id" => ["required", "exists:users,id"],
            "name" => ["required", "string"],
            "address" => ["required", "string"],
            "phone" => ["required", "string"],
        ];
    }
}
