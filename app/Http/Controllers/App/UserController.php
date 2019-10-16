<?php

namespace App\Http\Controllers\App;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\News;

use App\User;
use Auth;
use Illuminate\View\View;

class UserController extends Controller
{

    /**
     * @param User $user
     * @return Factory|View
     */
    public function show(User $user) {
        $news = News::all()->where('author_id', '=', $user->id);

        return view('user.profile.show')->with('user', $user)->with('news', $news);
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function news(User $user) {
        $amount = config('pagination.news-paginate');

        $news = $user->news()->with('author', 'structure')->orderBy('created_at', 'desc')->paginate($amount);

        foreach($news as $post) {
            $post->canEdit = Auth::user()->can('update', $post);
            $post->canDelete = Auth::user()->can('delete', $post);
        }

        return response()->json($news, 200);
    }

    /**
     * @param User $user
     * @return Factory|View
     */
    public function edit(User $user) {
        return view('user.profile.edit')->with('user', $user);
    }


    public function update(UpdateUserRequest $request, User $user) {
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        if ($user->email !== $request->input('email')) {
            $user->email = $request->input('email');
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }
        $user->save();

        if($request->hasFile('avatar')) {
            $user->updateAvatar($request->file('avatar'));
        }

        return back()->with('success', 'Profil bien mis à jour');
    }
}
