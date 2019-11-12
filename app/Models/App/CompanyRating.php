<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

class CompanyRating extends Model
{
    protected $fillable = ['skills', 'expertise', 'market', 'advantage_designed', 'team', 'shareholding_created', 'input_barrier', 'value_creation'];

    /**
     * @return mixed
     */
    public function structure () {
        return $this->morphOne(Rating::class, 'rating');
    }
}
