<?php

namespace App\Http\Requests;

use App\Models\App\Structure;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStructureRequest extends FormRequest
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
            'name' => 'required|max:255|unique:structures,id,' . $this->structure->id,
            'comment' => 'required|max:255',
            'siren' => 'required|digits:9|unique:structures,id,' . $this->structure->id,
            'siret' => 'required|digits:14',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
