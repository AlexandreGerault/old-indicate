<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\News;

use App\User;

class UserController extends Controller
{
    /**
     * Display a user profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function showProfile(Request $request) {
        $user = User::find($request->id);
        $news = News::all()->where('author_id', '=', $request->id);

        return view('user.profile.show')->with('user', $user)->with('news', $news);
    }
}
