<?php

namespace App\Http\Requests\Api\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderDetailsRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            "order_id",
            "product_id",
            "quantity",
            "amount",
        ];
    }
}
