<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\App\CompanyRating
 *
 * @property int $id
 * @property int $skills
 * @property int $expertise
 * @property int $market
 * @property int $advantage_designed
 * @property int $team
 * @property int $shareholding_created
 * @property int $input_barrier
 * @property int $value_creation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\App\Rating $structure
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating whereAdvantageDesigned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating whereExpertise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating whereInputBarrier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating whereMarket($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating whereShareholdingCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating whereSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating whereTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\CompanyRating whereValueCreation($value)
 * @mixin \Eloquent
 */
class CompanyRating extends Model
{
    protected $fillable = [
        'skills',
        'expertise',
        'market',
        'advantage_designed',
        'team',
        'shareholding_created',
        'input_barrier',
        'value_creation'
    ];

    /**
     * @return mixed
     */
    public function structure()
    {
        return $this->morphOne(Rating::class, 'rating');
    }
}
