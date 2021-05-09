<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'model' => ['required', 'string', 'max:255'],
            'registration' => ['required', 'string', 'regex:/^[A-Z]{2}-[A-Z]{2}\d{3}$/', 'unique:cars,registration,' . $this->car['id']],
            'year' => ['required', 'date_format:Y'],
            'car_class_id' => ['required'],
            'seats' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'photo' => ['nullable', 'image'],
            'description' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
