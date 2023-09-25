<?php

namespace App\Http\Requests\restaurant;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'deposit' => 'nullable|numeric',
            'date' => 'required|date',
            'time' => 'required',
            'number_of_people' => 'required|integer|min:1',
            'note' => 'nullable|string|max:255'
        ];
    }
}
