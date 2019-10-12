<?php

namespace App\Models\App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClaimDemand extends Model
{
    /**
     * Gets the author of the claim
     *
     * @return BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Gets the structure claimed
     *
     * @return BelongsTo
     */
    public function structure() {
        return $this->belongsTo(Structure::class);
    }
}
