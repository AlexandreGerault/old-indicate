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
