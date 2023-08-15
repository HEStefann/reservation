<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'available_people' => 'required|integer|min:1',
            'operating_status' => 'required|in:Open,Closed',
            'working_hours' => 'required|array',
            'working_hours.*.day' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'working_hours.*.opening_time' => 'required|date_format:H:i',
            'working_hours.*.closing_time' => 'required|date_format:H:i',
            'tags' => 'nullable|array',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric'
        ];
    }
}
