<?php

namespace App\Http\Controllers\Structure;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\Structure;
use Auth;
use Validator;
use Date;

class CrudController extends Controller
{
    /**
     * Show a form to create a structure.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('structure.create');
    }

    /**
     * Store a new structure.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'comment' => 'required|max:255',
            'siren' => 'required|digits:9',
            'siret' => 'required|digits:14',
            'type' => 'required|digits_between:0,2',
        ]);

        if ($validator->fails()) {
            return redirect(route('structure.create'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $structure = new Structure;

        $structure->name = $request->name;
        $structure->comment = $request->comment;
        $structure->siren = $request->siren;
        $structure->siret = $request->siret;
        $structure->type = $request->type;

        $structure->save();

        return redirect(route('home'));
    }

    
}
