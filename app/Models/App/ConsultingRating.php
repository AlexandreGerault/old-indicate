<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\App\ConsultingRating
 *
 * @property int $id
 * @property int $support_quality
 * @property int $procedure_simplicity
 * @property int $procedure_speed
 * @property int $global_rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\App\Rating $rating
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingRating whereGlobalRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingRating whereProcedureSimplicity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingRating whereProcedureSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingRating whereSupportQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingRating whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ConsultingRating extends Model
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
