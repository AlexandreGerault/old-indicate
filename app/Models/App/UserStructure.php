<?php

namespace App\Models\App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;

/**
 * App\Models\App\UserStructure
 *
 * @property-read UserAuthorizations $authorizations
 * @property-read Structure $structure
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserStructure byStructure($structure)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStructure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStructure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStructure pending()
 * @method static \Illuminate\Database\Eloquent\Builder|UserStructure query()
 * @mixin Eloquent
 * @property int $id
 * @property int $user_id
 * @property int|null $structure_id
 * @property int $status
 * @property string|null $jobname
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserStructure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStructure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStructure whereJobname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStructure whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStructure whereStructureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStructure whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserStructure whereUserId($value)
 */
class UserStructure extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'structure_id', 'status', 'jobname',
    ];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_structures';

    /**
     * Get the related user
     *
     * @return BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the related structure
     *
     * @return BelongsTo
     */
    public function structure() {
        return $this->belongsTo(Structure::class, 'structure_id');
    }

    /**
     * @param Builder $query
     * @param $structure
     * @return mixed
     */
    public function scopeByStructure ($query, $structure) {
        return $query->where('structure_id', '=', $structure->id);
    }

    /**
     * @param Builder $query
     * @return mixed
     */
    public function scopePending ($query) {
        return $query->where('status', '=', config('enums.structure_membership_request_status.PENDING'));
    }
}
