<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $customerId = $this->route('customer')?->id ?? null;

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email' . ($customerId ? ',' . $customerId : ''),
            'tel' => 'required|string|max:20',
            'fax' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'attn' => 'nullable|string|max:255',
            'remark' => 'nullable|string|max:255',
        ];
    }
}
