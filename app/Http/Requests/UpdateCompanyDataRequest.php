<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyDataRequest extends FormRequest
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
            //Company characteristics
            'partnership' => 'nullable',
            'accept_offers' => 'nullable',
            'bank_funding' => 'nullable',

            'turnover_projection' => 'nullable|numeric',
            'ebitda' => 'nullable|numeric',
            'clients_number' => 'nullable|numeric',
            'average_monthly_turnover' => 'nullable|numeric',
            'gross_margin' => 'nullable|numeric',
            'logistic_cost' => 'nullable|numeric',
            'marketing_cost' => 'nullable|numeric',
            'investment_sought' => 'nullable|numeric',
        ];
    }
}
