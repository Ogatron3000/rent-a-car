<?php

namespace App\Http\Requests\Admin;

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
            'passport' => ['required', 'alpha_num', 'min:6', 'max:9', 'unique:clients,passport,' . $this->client['id']],
            'phone' => ['nullable', 'integer', 'min:9', 'max: 14', 'unique:clients,phone,' . $this->client['id']],
            'email' => ['required', 'required', 'string', 'email', 'max:255', 'unique:clients,email,' . $this->client['id']],
            'notes' => ['nullable', 'string'],
        ];
    }
}
