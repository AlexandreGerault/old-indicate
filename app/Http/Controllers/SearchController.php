<?php

namespace App\Http\Controllers;

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
            return redirect(route('user.searchresult'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $structures = Structure::where('name', 'LIKE', '%'.$search.'%')
                            ->orderBy('name')
                            ->paginate(5);
        
        $users      = User::where('name', 'LIKE', '%'.$search.'%')
                            ->orderBy('name')
                            ->paginate(5);

        return view('user.searchresult')->with(['structures' => $structures, 'users' => $users]);
    }
}
