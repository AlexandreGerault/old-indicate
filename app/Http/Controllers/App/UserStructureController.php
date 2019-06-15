<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\App\UserStructure;
use App\Models\App\Structure;
use App\User;
use Auth;
use DB;

class UserStructureController extends Controller
{
    /**
     * Create a UserStructure relationship
     * 
     * @return
     */
    public function join(Request $request) {
        $userStructure = UserStructure::findOrFail(Auth::user()->userStructure->id);

        if ($userStructure->user->can('join', [User::class, Structure::findOrFail($request->id)])) {
            $userStructure->structure_id = $request->id;
            $userStructure->status = config('enums.structure_membership_request_status.PENDING');

            $userStructure->save();

            return redirect()->route('user.profile.show', ['id' => Auth::user()->id ]);
        }
        
        return back()->with('error', 'Vous ne pouvez pas rejoindre cette structure');
    }

    public function accepts(Request $request) {
        $userStructure = UserStructure::findOrFail($request->id);

        $userStructure->status = config('enums.structure_membership_request_status.ACCEPTED');

        $userStructure->save();

        return back()->with('success', 'La demande a bien été acceptée');
    }

    public function refuses(Request $request) {
        $userStructure = UserStructure::findOrFail($request->id);

        DB::table('demands_blacklist')->insert([
            'user_id' => $userStructure->user->id,
            'structure_id' => $userStructure->structure->id,
        ]);

        $userStructure->structure_id = null;
        $userStructure->save();
        
        return back()->with('success', 'La demande a bien été acceptée');
    }

    public function update (UpdateMemberRequest $request) {
        $validator = $request->validated();
        
        $member = UserStructure::findOrFail($request->id);

        $member->jobname = $request->jobname;
        $member->save();

        return back()->with('success', 'Le profil membre a bien été mis à jour.');        
    }
}
