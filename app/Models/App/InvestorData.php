<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\App\InvestorData
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|InvestorData newModelQuery()
 * @method static Builder|InvestorData newQuery()
 * @method static Builder|InvestorData query()
 * @method static Builder|InvestorData whereCreatedAt($value)
 * @method static Builder|InvestorData whereId($value)
 * @method static Builder|InvestorData whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $funding_domain
 * @property string|null $company_type
 * @property int|null $funding_min
 * @property int|null $funding_max
 * @property string|null $funding_location
 * @property string|null $funding_way
 * @property string|null $funding_step
 * @property int|null $provide_consulting
 * @property int|null $financial_means
 * @property string|null $funding_type
 * @property-read \App\Models\App\Structure $structure
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorData whereCompanyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorData whereFinancialMeans($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorData whereFundingDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorData whereFundingLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorData whereFundingMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorData whereFundingMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorData whereFundingStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorData whereFundingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorData whereFundingWay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\InvestorData whereProvideConsulting($value)
 */
class InvestorData extends Model
{
    /**
     * @return mixed
     */
    public function structure()
    {
        return $this->morphOne(Structure::class, 'data');
    }
}
