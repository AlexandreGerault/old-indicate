<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use App\User as User;

class BlogPost extends Model
{
    
    /**
     * Gets the author of the post
     */
    public function author() {
        return $this->belongsTo(User::class);
    }
}
