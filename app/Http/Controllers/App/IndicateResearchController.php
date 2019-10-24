<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\App\Structure;
use App\Models\App\CompanyData;
use App\Models\App\ConsultingData;
use App\Models\App\InvestorData;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;

class IndicateResearchController extends Controller
{
    /**
     * Display the dynamic form to make search with parameters (Vue form)
     *
     * @return Factory|View
     */
    public function form () {
        return view('search.forms.indicate-research');
    }

    public function results (Request $request) {
        $data = null;
        $keywords = $request->input('keywords');

        switch ($request->get('data_type')) {
            case "company":
                //data inputs
                $customer_min = $request->input('customer-min');
                $customer_max = $request->input('customer-max');

                $ebitda_min = $request->input('ebitda-min');
                $ebitda_max = $request->input('ebitda-max');

                $valued_turnover_min = $request->input('valued-turnover-min');
                $valued_turnover_max = $request->input('valued-turnover-max');

                $average_turnover_min = $request->input('average-turnover-min');
                $average_turnover_max = $request->input('average-turnover-max');

                $bfr = $request->input('bfr');

                $looking_investors = $request->input('looking-investors');
                $looked_investment_min = $request->input('looked-investment-min');
                $looked_investment_max = $request->input('looked-investment-max');


                $looking_partnership = $request->input('looking-partnership');
                $looking_shareholding = $request->input('looking-shareholding');
                $looking_bank_funding = $request->input('looking-bank-funding');


                $data = CompanyData::query()
                    ->when($customer_min, function ($query, $customer_min) {
                        return $query->where('clients_number', '>=', $customer_min);
                    })
                    ->when($customer_max, function ($query, $customer_max) {
                        return $query->where('clients_number', '<=', $customer_max);
                    })
                    ->when($ebitda_min, function ($query, $ebitda_min) {
                        return $query->where('ebitda', '>=', $ebitda_min);
                    })
                    ->when($ebitda_max, function ($query, $ebitda_max) {
                        return $query->where('ebitda', '<=', $ebitda_max);
                    })
                    ->when($valued_turnover_min, function ($query, $valued_turnover_min) {
                        return $query->where('turnover', '>=', $valued_turnover_min);
                    })
                    ->when($valued_turnover_max, function ($query, $valued_turnover_max) {
                        return $query->where('turnover', '<=', $valued_turnover_max);
                    })
                    ->when($average_turnover_min, function ($query, $average_turnover_min) {
                        return $query->where('average_monthly_turnover', '>=', $average_turnover_min);
                    })
                    ->when($average_turnover_max, function ($query, $average_turnover_max) {
                        return $query->where('average_monthly_turnover', '<=', $average_turnover_max);
                    })
                    ->when($bfr, function ($query, $bfr) {
                        return $query->where('bfr', '=', $bfr == 'on' ? true : false);
                    })
                    ->when($looking_investors, function ($query, $looking_investors) use ($looked_investment_min, $looked_investment_max) {
                        return $query->where('looking_for_funding', '=', $looking_investors == 'on' ? true : false)
                            ->where('investment_sought', '>=', $looked_investment_min)
                            ->where('investment_sought', '<=', $looked_investment_max);
                    })
                    ->when($looking_partnership, function ($query, $looking_partnership) {
                        return $query->where('looking_for_accompaniment', '=', $looking_partnership == 'on' ? true : false);
                    })
                    ->when($looking_shareholding, function ($query, $looking_shareholding) {
                        return $query->where('looking_for_accompaniment', '=', $looking_shareholding == 'on' ? true : false);
                    })
                    ->when($looking_bank_funding, function ($query, $looking_bank_funding) {
                        return $query->where('looking_for_funding', '=', $looking_bank_funding == 'on' ? true : false);
                    })
                    ->with('structure')
                    ->get();
                break;

            case "consulting":
                //DATA INPUTS
                $survival_rate = $request->input('survival-rate');
                $funding_help = $request->input('funding-help');
                $company_type = $request->input('company-type');
                $consulting_domain = $request->input('consulting-domain');
                $seeking_location = $request->input('seeking-location');

                $data = ConsultingData::query()
                    ->when($survival_rate, function ($query, $survival_rate) {
                        return $query->where('five_years_survival_rate', '=', $survival_rate);
                    })
                    ->when($funding_help, function ($query, $funding_help) {
                        return $query->where('funding_help', '=', $funding_help == 'on' ? true : false);
                    })
                    ->when($company_type, function ($query, $company_type) {
                        return $query->where('company_type', '=', $company_type);
                    })
                    ->when($consulting_domain, function ($query, $consulting_domain) {
                        return $query->where('consulting_domain', 'LIKE', $consulting_domain);
                    })
                    ->when($seeking_location, function ($query, $seeking_location) {
                        return $query->where('seeking_location', 'LIKE', $seeking_location);
                    })
                    ->with('structure')
                    ->get();

                break;

            case "investor":
                $investment_type = $request->input('investment-type');
                $investment_step = $request->input('investment-step');
                $investment_min = $request->input('investment-min');
                $investment_max = $request->input('investment-max');

                $data = InvestorData::query()
                    ->when($investment_min, function ($query, $investment_min) {
                        return $query->where('funding_min', '>=', $investment_min);
                    })
                    ->when($investment_max, function ($query, $investment_max) {
                        return $query->where('funding_max', '<=', $investment_max);
                    })
                    ->when($investment_type, function ($query, $investment_type) {
                        return $query->where('funding_type', '=', $investment_type);
                    })
                    ->when($investment_step, function ($query, $investment_step) {
                        return $query->where('funding_step', '=', $investment_step);
                    })
                    ->with('structure')
                    ->get();
                break;
        }

        return view('search.results.indicate-research')->with('data', $data);
    }
}
