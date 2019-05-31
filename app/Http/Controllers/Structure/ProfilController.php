<?php

namespace App\Http\Controllers\Structure;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\Structure;
use Auth;
use Validator;
use Date;

class ProfilController extends Controller
{
    /**
     * Display a structure profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function show(Request $request) {
        $structure = Structure::findOrFail($request->route()->parameter('id'));

        return view('structure.profil.show')->with('structure', $structure);
    }
}
