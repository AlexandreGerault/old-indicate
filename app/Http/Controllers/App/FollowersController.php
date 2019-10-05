<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\Structure;

class FollowersController extends Controller
{
    /**
     * Subscribe a structure to another structure's news
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function follows(Request $request) {
        $following = Structure::findOrFail($request->input('id'));
        $follower = auth()->user()->structure;

        if ($follower->follows($following)) {
            return back()->with('error', __('Vous suivez déjà '. $following->name . '.'));
        }

        $follower->following()->attach($following->id);

        return back()->with('success', __('Vous suivez maintenant ' . $following->name . '.'));
    }

    /**
     * Unsubscribe a structure to another structure's news
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function unfollows(Request $request) {
        $following = Structure::findOrFail($request->id);
        $follower = auth()->user()->structure;

        if (! $follower->follows($following)) {
            return back()->with('error', __('Vous ne suivez pas encore '. $following->name . '.'));
        }

        $follower->following()->detach($following->id);

        return back()->with('success', __('Vous ne suivez désormais plus ' . $following->name . '.'));
    }
}