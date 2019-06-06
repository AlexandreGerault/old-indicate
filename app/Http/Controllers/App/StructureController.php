<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\Structure;
use App\Http\Requests\StoreStructureRequest;
use App\Models\App\UserStructure;
use App\Events\StructureCreated;

use Auth;

class StructureController extends Controller
{
    /**
     * Show a form to create a structure.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('structure.create');
    }

    /**
     * Store a new structure.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(StoreStructureRequest $request) {
        $validator = $request->validated();

        $structure = Structure::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'siren'=> $request->siren,
            'siret' => $request->siret,
            'type' => $request->type
        ]);

        event(new StructureCreated($structure, Auth::user()));

        return redirect()->route('app.home');
    }

    /**
     * Display a list of structures for the user 
     */
    public function list() {
        $structures = Structure::all();

        return view('structure.list')->with('structures', $structures);
    }

    /**
     * Display a structure profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function showProfile(Request $request) {
        $structure = Structure::findOrFail($request->route()->parameter('id'));
        $news = $structure->news;

        return view('structure.profile.show')->with('structure', $structure)->with('news', $news);
    }

    public function news(Request $request) {
        $amount = config('pagination.news-paginate');
        $structure = Structure::findOrFail($request->route()->parameter('id'));

        $news = $structure->news()->with('author', 'structure')->orderBy('created_at', 'desc')->paginate($amount);

        foreach($news as $post) {
            $post->canEdit = Auth::user()->can('update', $post);
            $post->canDelete = Auth::user()->can('delete', $post);
        }

        return response()->json($news);
    }
}
