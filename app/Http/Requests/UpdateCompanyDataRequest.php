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
            'address' => 'nullable',
            'name' => 'required|string',
            'comment' => 'required|string',
            'phone_number' => 'required',
            'siren' => 'required',
            'siret' => 'required',
            'created_at' => 'required',
            'clients_number' => 'required|numeric',
            'share_capital' => 'required|numeric',
            'partnership' => 'nullable',
            'accept_offers' => 'nullable',
            'bank_funding' => 'nullable',
            'turnover_projection' => 'required|numeric',
            'ebitda' => 'required|numeric',
            'average_monthly_turnover' => 'required|numeric',
            'gross_margin' => 'required|numeric',
            'logistic_cost' => 'required|numeric',
            'marketing_cost' => 'required|numeric',
            'investment_sought' => 'required|numeric'
        ];
    }
}
