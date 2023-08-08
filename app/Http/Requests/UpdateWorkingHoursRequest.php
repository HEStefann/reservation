<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkingHoursRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'is_working' => $this->input('is_working') === 'true' ,
            'opening_time' => Carbon::parse($this->input('opening_time'))->format('H:i'),
            'closing_time' => Carbon::parse($this->input('closing_time'))->format('H:i'),
        ]);
    }

    public function rules(): array
    {
        return [
            'selected_date' => 'required|date',
            'is_working' => 'sometimes|required|boolean',
            'opening_time' => 'required_if:is_working,true|date_format:H:i',
            'closing_time' => 'required_if:is_working,true|date_format:H:i|after:opening_time',
            'available_people' => 'required_if:is_working,true|integer|min:0',
        ];
    }
}
