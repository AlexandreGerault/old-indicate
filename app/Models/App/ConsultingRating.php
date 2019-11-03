<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

class ConsultingRating extends Model
{
    /**
     * @return mixed
     */
    public function structure () {
        return $this->morphOne(Structure::class, 'data');
    }
}
