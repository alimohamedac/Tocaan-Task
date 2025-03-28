<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'items' => 'sometimes|array|min:1',
            'items.*.product_name' => 'sometimes|string|max:255',
            'items.*.quantity' => 'sometimes|integer|min:1',
            'items.*.price' => 'sometimes|numeric|min:0',
        ];
    }
}
