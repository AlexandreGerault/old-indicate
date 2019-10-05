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
                    ->with('structure')
                    ->get();
                break;

            case "consulting":
                dd('TEST');
                break;

            case "investor":
                dd('TEST');
                break;
        }

        return view('search.results.indicate-research')->with('data', $data);
    }
}
