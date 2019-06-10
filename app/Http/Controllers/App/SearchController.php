<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\App\Structure;
use App\User;
use Auth;
use Validator;
use Date;

class SearchController extends Controller
{
    /**
     * Display a list of search results
     *
     * @param  Request  $request
     * @return Response
     */
    public function search(Request $request) {
        $search = $request->input('search');

        $validator = Validator::make($request->all(), [
            'search' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $structures = Structure::where('name', 'LIKE', '%'.$search.'%')->orderBy('name')->paginate(5);
        
        $users = User::searchByName($search)->orderBy('firstname')->paginate(5);

        return view('user.searchresult')->with(['structures' => $structures, 'users' => $users]);
    }
}
