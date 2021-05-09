<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
        return [
            'passport' => ['required', 'exists:clients,passport'],
            'car_id' => ['required'],
            'from_date' => ['required', 'date', 'after_or_equal:today', 'before:to_date'],
            'to_date' => ['required', 'date', 'after:today', 'after:from_date'],
            'start_location_id' => ['required'],
            'end_location_id' => ['required'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
