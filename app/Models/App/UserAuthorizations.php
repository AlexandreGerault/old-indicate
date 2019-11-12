<?php

namespace App\Models\App;

use App\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\App\UserAuthorizations
 *
 * @property-read User $user
 * @method static Builder|UserAuthorizations newModelQuery()
 * @method static Builder|UserAuthorizations newQuery()
 * @method static Builder|UserAuthorizations query()
 * @mixin Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $create_news
 * @property int $edit_news
 * @property int $delete_news
 * @property int $follow_structure
 * @property int $manage_users
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $access_dashboard
 * @method static Builder|UserAuthorizations whereAccessDashboard($value)
 * @method static Builder|UserAuthorizations whereCreateNews($value)
 * @method static Builder|UserAuthorizations whereCreatedAt($value)
 * @method static Builder|UserAuthorizations whereDeleteNews($value)
 * @method static Builder|UserAuthorizations whereEditNews($value)
 * @method static Builder|UserAuthorizations whereFollowStructure($value)
 * @method static Builder|UserAuthorizations whereId($value)
 * @method static Builder|UserAuthorizations whereManageUsers($value)
 * @method static Builder|UserAuthorizations whereUpdatedAt($value)
 * @method static Builder|UserAuthorizations whereUserId($value)
 */
class UserAuthorizations extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_authorizations';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['id', 'user_id', 'created_at', 'updated_at'];

    /**
     * Return the UserStructure relationship
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
