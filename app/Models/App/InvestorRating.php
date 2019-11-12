<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

class InvestorRating extends Model
{
    protected $fillable = ['support_quality', 'procedure_simplicity', 'procedure_speed', 'global_rating'];

    /**
     * @return mixed
     */
    public function rating()
    {
        return $this->morphOne(Rating::class, 'rating');
    }
}
