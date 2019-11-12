<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use App\User as User;

/**
 * App\Models\Blog\BlogPost
 *
 * @property-read \App\User $author
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $author_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $publish
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost wherePublish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereUpdatedAt($value)
 */
class BlogPost extends Model
{
    
    /**
     * Gets the author of the post
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
