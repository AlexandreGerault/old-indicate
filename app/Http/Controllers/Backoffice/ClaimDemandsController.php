<?php

namespace App\Http\Controllers\Backoffice;

use App\Events\ValidatedClaimDemand;
use App\Http\Controllers\Controller;
use App\Models\App\ClaimDemand;
use App\Models\App\Structure;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ClaimDemandsController extends Controller
{
    public function index()
    {
        $claimDemands = ClaimDemand::paginate(1);

        return view('backoffice.claim_demand.index')->with('claimdemands', $claimDemands);
    }

    public function validates(Request $request)
    {
        $user = User::find($request->get('user_id'));
        $structure = Structure::find($request->get('structure_id'));
        event(new ValidatedClaimDemand($user, $structure));
        DB::table('structures_owners')
            ->insert([
                'user_id' => $request->input('user_id'),
                'structure_id' => $request->input('structure_id'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()]);
        DB::table('claim_demands')
            ->where('user_id', '=', $request->get('user_id'))
            ->where('structure_id', '=', $request->get('structure_id'))
            ->delete();

        return redirect(route('claimdemand.index'))->with('succès', 'Demande de revendication acceptée');
    }

    public function rejects(ClaimDemand $claimDemand)
    {
        $claimDemand->delete();

        return view('claimdemand.index')->with('success', 'Demande de revendication rejetée');
    }
}
