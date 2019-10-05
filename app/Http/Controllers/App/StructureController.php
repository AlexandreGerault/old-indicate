<?php

namespace App\Http\Controllers\App;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\App\Structure;
use App\Http\Requests\StoreStructureRequest;
use Illuminate\View\View;

class StructureController extends Controller
{
    /**
     * Show a form to create a structure.
     *
     * @return View
     */
    public function create() {
        return view('structure.create');
    }

    /**
     * Store a new structure
     *
     * @param StoreStructureRequest $request
     * @return RedirectResponse
     */
    public function store(StoreStructureRequest $request) {
        Structure::create($request->validated());

        return redirect()->route('app.home');
    }

    /**
     * Display all the structure
     *
     * @return Factory|View
     */
    public function index() {
        $structures = Structure::all();

        return view('structure.list')->with('structures', $structures);
    }

    /**
     * Display a structure profile
     *
     * @param Structure $structure
     * @return Factory|View
     */
    public function show(Structure $structure) {
        return view('structure.show')->with('structure', $structure)->with('news', $structure->news);
    }

    /**
     * Return a Json response of news
     *
     * @param Structure $structure
     * @return JsonResponse
     */
    public function news(Structure $structure) {
        $amount = config('pagination.news-paginate');

        $news = $structure->news()->with('author', 'structure')->orderBy('created_at', 'desc')->paginate($amount);

        foreach($news as $post) {
            $post->canEdit = auth()->user()->can('update', $post);
            $post->canDelete = auth()->user()->can('delete', $post);
        }

        return response()->json($news, 200);
    }

    /**
     * Return a Json response of news feed
     *
     * @param Structure $structure
     * @return JsonResponse
     */
    public function timeline(Structure $structure) {
        $amount = config('pagination.news-paginate');

        $news = $structure->timeline()->with('author', 'structure')->orderBy('created_at', 'desc')->paginate($amount);

        foreach($news as $post) {
            $post->canEdit = auth()->user()->can('update', $post);
            $post->canDelete = auth()->user()->can('delete', $post);
        }

        return response()->json($news, 200);
    }
}
