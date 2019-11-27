<?php

namespace App\Models\App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\App\ClaimDemand
 *
 * @property int $user_id
 * @property int $structure_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\App\Structure $structure
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ClaimDemand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ClaimDemand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ClaimDemand query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ClaimDemand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ClaimDemand whereStructureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ClaimDemand whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ClaimDemand whereUserId($value)
 * @mixin \Eloquent
 */
class ClaimDemand extends Model
{
    /**
     * Gets the author of the claim
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Gets the structure claimed
     *
     * @return BelongsTo
     */
    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }
}
