<?php

namespace App\Http\Controllers\App;

use App\Http\Requests\UpdateCompanyDataRequest;
use App\Http\Requests\UpdateConsultingDataRequest;
use App\Http\Requests\UpdateInvestorDataRequest;
use App\Http\Controllers\Controller;
use App\Models\App\CompanyData;
use App\Models\App\Structure;
use Illuminate\Http\RedirectResponse;

class StructureDataController extends Controller
{
    /**
     * The function is called by a form POST method to update
     * company data
     *
     * @param UpdateCompanyDataRequest $request
     * @param Structure $structure
     * @return RedirectResponse
     */
    public function updateCompanyData (UpdateCompanyDataRequest $request, Structure $structure) {
        $requestData = $request->validated();
        /** @var CompanyData $data */
        $data = $structure->data;

        foreach ($data->makeHidden('id')->toArray() as $key => $value) {
            if ($request->input($key) !== null) $data->$key = $requestData[$key];
        }
        foreach ($structure->makeHidden(['id', 'validated', 'data_type', 'data_id', 'data'])->toArray() as $key => $value) {
            if ($request->input($key) !== null) $structure->$key = $requestData[$key];
        }

        $structure->save();
        $data->save();

        return back()->with('success', 'success.data.updated');
    }

    public function updateInvestorData (UpdateInvestorDataRequest $request) {

    }

    public function updateConsultingData (UpdateConsultingDataRequest $request) {

    }
}
