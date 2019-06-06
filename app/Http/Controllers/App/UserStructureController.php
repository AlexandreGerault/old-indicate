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
        $userStructure = UserStructure::findOrFail(Auth::user()->userStructure->id);

        $userStructure->structure_id = $request->id;
        $userStructure->status = config('enums.structure_membership_request_status.PENDING');

        $userStructure->save();

        return redirect()->route('user.profile.show', ['id' => Auth::user()->id ]);
    }
}
