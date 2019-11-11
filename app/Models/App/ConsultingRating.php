<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

class ConsultingRating extends Model
{
    /**
     * @return mixed
     */
    public function rating () {
        return $this->morphOne(Rating::class, 'rateable');
    }
}
