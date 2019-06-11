<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\App\Structure;

class FollowersController extends Controller
{
    public function follows(Request $request) {
        $following = Structure::findOrFail($request->id);
        $follower = Auth::user()->structure;

        if ($follower->follows($follower)) {
            return back()->with('error', __('Vous suivez déjà '. $following->name . '.'));
        }

        $follower->following()->attach($following->id);

        return back()->with('success', __('Vous suivez maintenant ' . $follower->name . '.'));
    }

    public function unfollows(Request $request) {
        $following = Structure::findOrFail($request->id);
        $follower = Auth::user()->structure;

        if (! $follower->follows($following)) {
            return back()->with('error', __('Vous ne suivez pas encore '. $following->name . '.'));
        }

        $follower->following()->detach($following->id);

        return back()->with('success', __('Vous ne suivez désormais plus ' . $following->name . '.'));
    }
}