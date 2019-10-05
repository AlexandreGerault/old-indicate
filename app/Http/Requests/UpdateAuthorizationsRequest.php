<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Schema;
use App\Models\App\UserStructure;
use App\Models\App\Structure;

class UpdateAuthorizationsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('manage-users', Structure::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $columns = \array_diff(Schema::getColumnListing('users_authorizations'), ['id', 'user_id', 'created_at', 'updated_at']);
        $rules = [];

        foreach($columns as $column) {
            $rules[$column] = 'boolean';
        }

        return $rules;
    }
}
