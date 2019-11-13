<?php

namespace App\Models\App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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
