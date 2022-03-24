<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
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
        return   [
            'type' => ['required', 'string'],
            'serial_number' => ['required', 'string'],
            'description' => ['required', 'string'],
            'fixed_or_movable' => ['required', 'string'],
            'picture_path' => ['nullable', 'image'],
            'purchased_date' => ['required', 'date'],
            'start_use_date' => ['required', 'date'],
            'purchase_price' => ['required', 'string'],
            'warranty_expiry_date' => ['required', 'date'],
            'degradation_in_years' => ['required', 'string'],
            'current_value_in_naira' => ['required', 'string'],
            'location' => ['required', 'string']
        ];

    }
}
