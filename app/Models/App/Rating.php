<?php

namespace App\Models\App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\App\Rating
 *
 * @property int $author_id
 * @property int $structure_id
 * @property string $rating_type
 * @property int $rating_id
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $author
 * @property-read \App\Models\App\Rating $rating
 * @property-read \App\Models\App\Structure $structure
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Rating whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Rating whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Rating whereRatingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Rating whereRatingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Rating whereStructureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Rating whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rating extends Model
{
    /**
     * Gets the author of the rate
     *
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Gets the structure rated
     *
     * @return BelongsTo
     */
    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }

    /**
     * Returns an array of rating critera depending on the structure type
     *
     * @return MorphTo
     */
    public function rating()
    {
        return $this->morphTo();
    }

    public function mean()
    {
        $sum = 0;
        $ratingsArray = $this->rating->makeHidden(['id', 'created_at', 'updated_at'])->attributesToArray();
        foreach ($ratingsArray as $key => $value) {
            $sum += $value;
        }
        return $sum/count($ratingsArray);
    }
}
