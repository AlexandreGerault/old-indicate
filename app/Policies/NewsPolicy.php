<?php

namespace App\Policies;

use App\User;
use App\Models\App\News;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability) {
        return ($user->isStructureOwner($user->structure));
    }

    /**
     * Determine whether the user can view the news.
     *
     * @param  \App\User  $user
     * @param  \App\App\News  $news
     * @return mixed
     */
    public function view(User $user, News $news)
    {
        return true;
    }

    /**
     * Determine whether the user can create news.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->authorizations->create_news;
    }

    /**
     * Determine whether the user can update the news.
     *
     * @param  \App\User  $user
     * @param  \App\Models\App\News  $news
     * @return mixed
     */
    public function update(User $user, News $news)
    {
        return $user->authorizations->edit_news || $user->owns($news);
    }

    /**
     * Determine whether the user can delete the news.
     *
     * @param  \App\User  $user
     * @param  \App\Models\App\News  $news
     * @return mixed
     */
    public function delete(User $user, News $news)
    {
        return $user->authorizations->delete_news || $user->owns($news);
    }

    /**
     * Determine whether the user can restore the news.
     *
     * @param  \App\User  $user
     * @param  \App\Models\App\News  $news
     * @return mixed
     */
    public function restore(User $user, News $news)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the news.
     *
     * @param  \App\User  $user
     * @param  \App\Models\App\News  $news
     * @return mixed
     */
    public function forceDelete(User $user, News $news)
    {
        //
    }
}
