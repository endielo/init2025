<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'ref' => 'required|string|max:50',
            'customer_id' => 'required|exists:customers,id',
            'type' => 'nullable|string|max:50',
            'status' => 'nullable|string|max:50',
            'date' => 'nullable|date',
            'due_date' => 'nullable|date',
            'description' => 'required|string|max:250',
            'total_amount' => 'nullable|numeric',
        ];
    }
}
