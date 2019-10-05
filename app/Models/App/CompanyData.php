<?php

namespace App\Models\App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\App\CompanyData
 *
 * @property int $id
 * @property int $accept_offers
 * @property int $partnership
 * @property int $bank_funding
 * @property int $wcr
 * @property int $shareholding
 * @property int $looking_for_funding
 * @property int $looking_for_accompaniment
 * @property int $share_capital
 * @property int $employees_number
 * @property int $clients_number
 * @property int $turnover
 * @property int $turnover_progression
 * @property int $average_monthly_turnover
 * @property int $logistic_cost
 * @property int $marketing_cost
 * @property int $banking_investment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|CompanyData newModelQuery()
 * @method static Builder|CompanyData newQuery()
 * @method static Builder|CompanyData query()
 * @method static Builder|CompanyData whereAcceptOffers($value)
 * @method static Builder|CompanyData whereAverageMonthlyTurnover($value)
 * @method static Builder|CompanyData whereBankFunding($value)
 * @method static Builder|CompanyData whereBankingInvestment($value)
 * @method static Builder|CompanyData whereClientsNumber($value)
 * @method static Builder|CompanyData whereCreatedAt($value)
 * @method static Builder|CompanyData whereEmployeesNumber($value)
 * @method static Builder|CompanyData whereId($value)
 * @method static Builder|CompanyData whereLogisticCost($value)
 * @method static Builder|CompanyData whereLookingForAccompaniment($value)
 * @method static Builder|CompanyData whereLookingForFunding($value)
 * @method static Builder|CompanyData whereMarketingCost($value)
 * @method static Builder|CompanyData wherePartnership($value)
 * @method static Builder|CompanyData whereShareCapital($value)
 * @method static Builder|CompanyData whereShareholding($value)
 * @method static Builder|CompanyData whereTurnover($value)
 * @method static Builder|CompanyData whereTurnoverProgression($value)
 * @method static Builder|CompanyData whereUpdatedAt($value)
 * @method static Builder|CompanyData whereWcr($value)
 * @mixin Eloquent
 */
class CompanyData extends Model
{
    /**
     * @return mixed
     */
    public function structure () {
        return $this->morphOne(Structure::class, 'data');
    }
}
