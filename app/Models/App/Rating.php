<?php

namespace App\Models\App;

use App\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\App\Rating
 *
 * @property int $author_id
 * @property int $structure_id
 * @property string $rating_type
 * @property int $rating_id
 * @property string $comment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $author
 * @property-read Rating $rating
 * @property-read Structure $structure
 * @method static Builder|Rating newModelQuery()
 * @method static Builder|Rating newQuery()
 * @method static Builder|Rating query()
 * @method static Builder|Rating whereAuthorId($value)
 * @method static Builder|Rating whereComment($value)
 * @method static Builder|Rating whereCreatedAt($value)
 * @method static Builder|Rating whereRatingId($value)
 * @method static Builder|Rating whereRatingType($value)
 * @method static Builder|Rating whereStructureId($value)
 * @method static Builder|Rating whereUpdatedAt($value)
 * @mixin Eloquent
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
     * Returns an array of rating criteria depending on the structure type
     *
     * @return MorphTo
     */
    public function rating()
    {
        return $this->morphTo();
    }

    public function mean()
    {
        $ratingsArray = $this->rating->makeHidden(['id', 'created_at', 'updated_at'])->attributesToArray();
        return array_reduce($ratingsArray, function ($acc, $rating) {
            return $acc + $rating;
        })/count($ratingsArray);
    }
}
