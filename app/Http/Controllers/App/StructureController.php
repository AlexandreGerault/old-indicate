<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\Structure;
use App\Http\Requests\StoreStructureRequest;
use App\Models\App\UserStructure;
use App\Events\StructureCreated;

use Auth;
use DB;

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

        return response()->json($news, 200);
    }

    public function follows(Request $request) {
        $structureToFollow = Structure::findOrFail($request->id);
        $structureThatFollows = Auth::user()->structure;

        if ($structureThatFollows->follows($structureToFollow)) {
            return back()->with('error', __('Vous suivez déjà '. $structureToFollow->name . '.'));
        }

        DB::table('followers')->insert([
            'follower_id' => $structureThatFollows->id,
            'followed_id' => $structureToFollow->id,
            'created_at' => new \Datetime(),
            'updated_at' => null
        ]);

        return back()->with('success', __('Vous suivez maintenant ' . $structureToFollow->name . '.'));
    }

    public function unfollows(Request $request) {
        $structureToUnfollow = Structure::findOrFail($request->id);
        $structureThatUnfollows = Auth::user()->structure;

        if (! $structureThatUnfollows->follows($structureToUnfollow)) {
            return back()->with('error', __('Vous ne suivez pas encore '. $structureToFollow->name . '.'));
        }

        DB::table('followers')->where([
            ['follower_id', '=', $structureThatUnfollows->id],
            ['followed_id', '=', $structureToUnfollow->id]
        ])->delete();

        return back()->with('success', __('Vous ne suivez désormais plus ' . $structureToUnfollow->name . '.'));
    }
}
