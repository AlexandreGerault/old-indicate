<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class ProfilController extends Controller
{
    /**
     * Display a user profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function show(Request $request) {

        $user = User::find($request->id);

        return view('user.profil.show')->with('user', $user);
    }
}
