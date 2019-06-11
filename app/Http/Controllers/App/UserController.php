<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\News;

use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a user profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function showProfile(Request $request) {
        $user = User::findOrFail($request->id);
        $news = News::all()->where('author_id', '=', $request->id);

        return view('user.profile.show')->with('user', $user)->with('news', $news);
    }

    public function news(Request $request) {
        $amount = config('pagination.news-paginate');
        $user = User::findOrFail($request->route()->parameter('id'));

        $news = $user->news()->with('author', 'structure')->orderBy('created_at', 'desc')->paginate($amount)->all();

        foreach($news as $post) {
            $post->canEdit = Auth::user()->can('update', $post);
            $post->canDelete = Auth::user()->can('delete', $post);
        }

        return response()->json($news, 200);
    }
}
