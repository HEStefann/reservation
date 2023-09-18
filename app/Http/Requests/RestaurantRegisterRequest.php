<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRegisterRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'string|max:255',
            'available_people' => 'required|integer|min:1',
            'operating_status' => 'required|in:Open,Closed',
            'working_hours' => 'required|array|min:1|max:12',
            'working_hours.*.opening_time' => 'nullable|date_format:H:i',
            'working_hours.*.closing_time' => 'nullable|date_format:H:i',
            'lat' => 'required|numeric|min:-90|max:90',
            'lng' => 'required|numeric|min:-90|max:90',
            'address' => 'required|string|max:255',
        ];
    }
}
