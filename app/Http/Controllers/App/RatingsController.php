<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\App\Rating;
use App\Models\App\Structure;
use App\Models\App\CompanyRating;
use App\Models\App\ConsultingRating;
use App\Models\App\InvestorRating;
use Illuminate\Http\Request;
use Validator;

class RatingsController extends Controller
{
    public function index (Structure $structure) {
        $ratings = $structure->ratings;

        return view('structure.rating.index')->with('ratings', $ratings)->with('structure', $structure);
    }

    public function show (Structure $structure, Rating $rating) {
        return view('structure.rating.show')->with('rating', $rating)->with('structure', $structure);
    }

    public function edit (Structure $structure, Rating $rating) {
        return view('structure.rating.edit')->with('rating', $rating)->with('structure', $structure);
    }

    public function delete (Rating $rating) {
        try {
            $rating->delete();
            return redirect()->back()->with('success', __('rating.deleted.success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('rating.deleted.error'));
        }
    }

    public function create (Structure $structure) {
        $this->authorize('create', [Rating::class, $structure]);

        return view('structure.rating.create')->with('structure', $structure);
    }

    public function store (Request $request, Structure $structure) {
        $this->authorize('create', [Rating::class, $structure]);

        $validator = null;
        $type = $structure->data_type;
        $ratingClass = 'App\Models\App\\' . ucfirst($type) . 'Rating';

        switch ($type) {
            case 'company':
                $validator = Validator::make($request->all(), [
                    'comment' => 'required|string',
                    'skills' => 'required|numeric|between:0,5',
                    'expertise' => 'required|numeric|between:0,5',
                    'market' => 'required|numeric|between:0,5',
                    'advantage_designed' => 'required|numeric|between:0,5',
                    'team' => 'required|numeric|between:0,5',
                    'shareholding_created' => 'required|numeric|between:0,5',
                    'input_barrier' => 'required|numeric|between:0,5',
                    'value_creation' => 'required|numeric|between:0,5',
                ]);
                break;

            case 'investor':
            case 'consulting':
                $validator = Validator::make($request->all(), [
                    'comment' => 'required|string',
                    'support_quality' => 'required|numeric|between:0,5',
                    'procedure_simplicity' => 'required|numeric|between:0,5',
                    'procedure_speed' => 'required|numeric|between:0,5',
                    'global_rating' => 'required|numeric|between:0,5',
                ]);
                break;

            default:
                return redirect()->back()->with('error', __('rating.store.error'));
                break;
        }

        $validated = $validator->validated();

        $rateable = new $ratingClass($validated);
        $rateable->save();

        $rating = new Rating();
        $rating->comment = $validated['comment'];
        $rating->structure()->associate($structure);
        $rating->author()->associate(auth()->user());
        $rating->rating()->associate($rateable);
        $rating->save();

        return route('rating.index')->back('structure', $structure);
    }

    public function update () {

    }
}
