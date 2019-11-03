<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

class CompanyRating extends Model
{
    /**
     * @return mixed
     */
    public function structure () {
        return $this->morphOne(Structure::class, 'data');
    }
}
