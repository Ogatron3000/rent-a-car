<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'country_id' => ['required'],
            'passport' => ['required', 'string', 'unique:clients,passport,' . $this->client['id']],
            'phone' => ['nullable', 'string', 'unique:clients,phone,' . $this->client['id']],
            'email' => ['nullable', 'required', 'string', 'email', 'max:255', 'unique:clients,email,' . $this->client['id']],
            'first_reservation' => ['required', 'date'],
            'last_reservation' => ['required', 'date'],
            'registered' => ['required', 'boolean'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
