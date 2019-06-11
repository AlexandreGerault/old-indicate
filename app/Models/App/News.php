<?php

namespace App\Models\App;

use App\Models\App\Structure;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Auth;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'structure_id', 'author_id', 'title', 'content',
    ];
    
    /**
     * Gets the author of the news
     */
    public function author() {
        return $this->belongsTo(User::class);
    }

    /**
     * Gets the structure the news is related to
     */
    public function structure() {
        return $this->belongsTo(Structure::class);
    }

    public function scopeByFollowersOf($query, $user) {
        return $query->whereIn('structure_id', auth()->user()->structure->following->pluck('id'));
    }
}
