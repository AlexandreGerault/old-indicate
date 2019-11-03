<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\App\UserStructure;
use Auth;

class StoreStructureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //Address
            'road' => 'required|string',
            'house_number' => 'required|numeric',
            'city' => 'required|string',
            'postcode' => 'required|numeric',
            'county' => 'required|string',
            'country' => 'required|string',

            //Contact means
            'phone_number' => 'required|numeric',
            'email' => 'required|email',

            //Structure
            'name' => 'required|max:255|unique:structures',
            'comment' => 'required|max:255',
            'siren' => 'required|digits:9|unique:structures',
            'siret' => 'required|digits:14',
            'data_type' => 'required|string',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
