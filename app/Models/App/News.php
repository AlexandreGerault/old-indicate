<?php

namespace App\Models\App;

use App\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\App\News
 *
 * @property-read User $author
 * @property-read Structure $structure
 * @method static Builder|News byFollowersOf($structure)
 * @method static Builder|News newModelQuery()
 * @method static Builder|News newQuery()
 * @method static Builder|News query()
 * @mixin Eloquent
 * @property int $id
 * @property int $structure_id
 * @property int $author_id
 * @property string|null $title
 * @property string $content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|News whereAuthorId($value)
 * @method static Builder|News whereContent($value)
 * @method static Builder|News whereCreatedAt($value)
 * @method static Builder|News whereId($value)
 * @method static Builder|News whereStructureId($value)
 * @method static Builder|News whereTitle($value)
 * @method static Builder|News whereUpdatedAt($value)
 */
class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'title', 'content',
    ];

    /**
     * Gets the author of the news
     *
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Gets the structure the news is related to
     *
     * @return BelongsTo
     */
    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }

    /**
     * @param Builder $query
     * @param Structure $structure
     * @return mixed
     */
    public function scopeByFollowersOf($query, $structure)
    {
        return $query
            ->whereIn('structure_id', $structure->following->pluck('id'))
            ->orWhere('structure_id', '=', $structure->id);
    }
}
