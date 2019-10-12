<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\App\ClaimDemand;
use Illuminate\Http\RedirectResponse;
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function join(Request $request) {
        $userStructure = UserStructure::findOrFail(auth()->user()->userStructure->id);

        if ($userStructure->user->can('join', [User::class, Structure::findOrFail($request->input('id'))])) {
            $userStructure->structure_id = $request->input('id');
            $userStructure->status = config('enums.structure_membership_request_status.PENDING');

            $userStructure->save();

            return redirect()->route('user.profile.show', ['id' => auth()->user()->id ]);
        }

        return back()->with('error', __('error.user_structure.join'));
    }

    /**
     * Update UserStructure status to ACCEPTED
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function accepts(Request $request) {
        $userStructure = UserStructure::findOrFail($request->id);

        $userStructure->status = config('enums.structure_membership_request_status.ACCEPTED');

        $userStructure->save();

        return back()->with('success', __('success.user_structure.demand_accepted'));
    }

    /**
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function refuses(Request $request) {
        $userStructure = UserStructure::findOrFail($request->id);

        DB::table('demands_blacklist')->insert([
            'user_id' => $userStructure->user->id,
            'structure_id' => $userStructure->structure->id,
        ]);

        $userStructure->structure_id = null;
        $userStructure->save();

        return back()->with('success', __('success.user_structure.demand_accepted'));
    }

    /**
     * Update member's information
     *
     * @param UpdateMemberRequest $request
     * @return RedirectResponse
     */
    public function update (UpdateMemberRequest $request) {
        $request->validated();

        $member = UserStructure::findOrFail($request->input('id'));

        $member->jobname = $request->input('jobname');
        $member->save();

        return back()->with('success', __('success.user_structure.member_update'));
    }

    public function claim (Request $request, Structure $structure) {
        $claim = new ClaimDemand();
        $claim->user()->associate(auth()->user());
        $claim->structure()->associate($structure);
        $claim->save();

        return redirect()->back()->with('success', __('Votre demande a bien été prise en compte.'));
    }
}
