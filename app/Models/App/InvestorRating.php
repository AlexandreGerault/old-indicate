<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\App\InvestorRating
 *
 * @property int $id
 * @property int $support_quality
 * @property int $procedure_simplicity
 * @property int $procedure_speed
 * @property int $global_rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\App\Rating $rating
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorRating whereGlobalRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorRating whereProcedureSimplicity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorRating whereProcedureSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorRating whereSupportQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorRating whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
