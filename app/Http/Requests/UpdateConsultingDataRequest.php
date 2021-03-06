<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsultingDataRequest extends FormRequest
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
            'funding_help' => 'nullable',
            'five_years_survival_rate' => 'nullable|numeric',
            'conulting_type' => 'nullable|string',
            'company_type' => 'nullable|string',
            'consulting_domain' => 'nullable|string',
            'seeking_location' => 'nullable|string',
        ];
    }
}
