<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;
use Illuminate\Support\Facades\Input;

use App\Models\App\News;
use App\Models\App\Structure;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $structure = Structure::find(Input::get('structure_id'));

        return Auth::user()->can('create', [News::class, $structure]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'nullable|max:255',
            'content' => 'required|string',
        ];
    }
}
