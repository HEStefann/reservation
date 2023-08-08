<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantSettingsRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'available_people' => 'sometimes|required|integer|min:1',
            'operating_status' => 'sometimes|required|in:open,close',
            'working_hours.*.opening_time' => 'sometimes|required|date_format:H:i',
            'working_hours.*.closing_time' => 'sometimes|required|date_format:H:i',
        ];
    }
}
