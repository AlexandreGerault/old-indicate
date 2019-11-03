<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

class InvestorRating extends Model
{
    /**
     * @return mixed
     */
    public function structure () {
        return $this->morphOne(Structure::class, 'rating');
    }
}
