<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\App\UserStructure;
use Auth;

class UserStructureController extends Controller
{
    /**
     * Create a UserStructure relationship
     * 
     * @return
     */
    public function join(Request $request) {
        $userStructure = new UserStructure;

        $userStructure->user_id = Auth::user()->id;
        $userStructure->structure_id = $request->id;

        $userStructure->save();

        return redirect()->route('user.profile.show', ['id' => Auth::user()->id ]);
    }
}
