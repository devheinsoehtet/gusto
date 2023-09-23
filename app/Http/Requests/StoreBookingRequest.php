<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'car_id' => 'required|exists:App\Models\Car,id',
            'start_date' => 'required|date|date_format:Y-m-d',
            'end_date' => 'required|date|after_or_equal:start_date'
        ];
    }
}
