<?php

namespace App\Policies;

use App\Models\App\Rating;
use App\Models\App\Structure;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RatingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether a user can rate a structure
     *
     * @param User $user
     * @param Structure $structure
     * @return bool
     */
    public function create(User $user, Structure $structure)
    {
        return $user->hasStructure()
            && $user->userStructure->structure->id !== $structure->id
            && ! Rating::query()
                ->where('author_id', '=', $user->id)
                ->where('structure_id', '=', $structure->id)
                ->exists();
    }

    /**
     * Determine whether a user can edit a rating
     *
     * @param User $user
     * @param Rating $rating
     * @return bool
     */
    public function edit(User $user, Rating $rating)
    {
        return $rating->author->id === $user->id;
    }

    /**
     * Determine whether a user can update a rating
     *
     * @param User $user
     * @param Rating $rating
     * @return bool
     */
    public function update(User $user, Rating $rating)
    {
        return $rating->author->id === $user->id;
    }

    /**
     * Determine whether a user can delete a rating
     *
     * @param User $user
     * @param Rating $rating
     * @return bool
     */
    public function delete(User $user, Rating $rating)
    {
        return $rating->author->id === $user->id;
    }
}
