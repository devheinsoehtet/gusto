<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'registration_no' => [
                'required',
                'string',
                'regex:/[1-9][A-Z]-\d{4}/',
                'unique:App\Models\Car,registration_no'
            ],
            'status' => 'required|string',
            'rental_rate' => 'required|numeric|min_digits:6|max_digits:8',
            'door_count' => 'required|string',
            'seat_count' => 'required|string',
            'fuel_type' => 'required|string',
            'gear_box_type' => 'required|string',
            'details' => 'required|string',
            'image' => 'required|image',
        ];
    }
}
