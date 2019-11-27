<?php

namespace App\Models\App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\App\ConsultingData
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ConsultingData newModelQuery()
 * @method static Builder|ConsultingData newQuery()
 * @method static Builder|ConsultingData query()
 * @method static Builder|ConsultingData whereCreatedAt($value)
 * @method static Builder|ConsultingData whereId($value)
 * @method static Builder|ConsultingData whereUpdatedAt($value)
 * @mixin Eloquent
 * @property int|null $five_years_survival_rate
 * @property string|null $consulting_type
 * @property int|null $funding_help
 * @property string|null $company_type
 * @property string|null $consulting_domain
 * @property string|null $seeking_location
 * @property-read \App\Models\App\Structure $structure
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingData whereCompanyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingData whereConsultingDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingData whereConsultingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingData whereFiveYearsSurvivalRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingData whereFundingHelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\ConsultingData whereSeekingLocation($value)
 */
class ConsultingData extends Model
{
    /**
     * @return mixed
     */
    public function structure()
    {
        return $this->morphOne(Structure::class, 'data');
    }
}
