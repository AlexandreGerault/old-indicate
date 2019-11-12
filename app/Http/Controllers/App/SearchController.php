<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\App\Structure;
use App\User;
use Auth;
use Illuminate\View\View;
use Validator;
use Date;

class SearchController extends Controller
{
    /**
     * Display a list of search results
     *
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public function search(Request $request)
    {
        $search = $request->input('search');

        $validator = Validator::make($request->all(), [
            'search' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $structures = Structure::searchByName($search)->orderBy('name')->paginate(5);
        
        $users = User::searchByName($search)->orderBy('firstname')->paginate(5);

        return view('user.search_results')->with(['structures' => $structures, 'users' => $users]);
    }

    /**
     * Retrieve all users or structures from name
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function ajaxSearch(Request $request)
    {
        $search = $request->input('search');

        $validator = Validator::make($request->all(), [
            'search' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(403);
        }

        $structures = Structure::searchByName($search)->orderBy('name')->paginate(5);
        $users = User::searchByName($search)->orderBy('firstname')->paginate(5);

        return response()->json(['users' => $users, 'structures' => $structures]);
    }
}
