<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function prepareForValidation()
    {
        $selectedTables = $this->input('selectedTables');
        $tablesArray = explode(',', $selectedTables);

        $selectedTablesArray = [];
        foreach ($tablesArray as $value) {
            $selectedTablesArray[] = intval(trim($value));
        }

        $this->merge([
            'selectedTables' => $selectedTablesArray,
        ]);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'deposit' => 'nullable|numeric',
            'date' => 'required|date',
            'time' => 'required',
            'number_of_people' => 'required|integer|min:1',
            'note' => 'nullable|string|max:255'
        ];
    }
}
