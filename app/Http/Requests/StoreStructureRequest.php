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
        return Auth::check() && !(Auth::user()->hasStructure());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:structures',
            'comment' => 'required|max:255',
            'siren' => 'required|digits:9|unique:structures',
            'siret' => 'required|digits:14',
            'type' => 'required|digits_between:0,2',
        ];
    }
}
