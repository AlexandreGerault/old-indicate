<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;

use App\Models\App\News;
use App\Models\App\Structure;
use App\User;

use Auth;

class NewsController extends Controller
{
    /**
     * Store a news.
     *
     * @param  StoreNewsRequest  $request
     * @return Response
     */
    public function store(StoreNewsRequest $request) {
        $validator = $request->validated();

        $this->authorize('create', News::class);
        
        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => Auth::id(),
            'structure_id' => Auth::user()->structure->id,
        ]);

        return back();
    }

    /**
     * Update a news.
     * 
     * @param  StoreNewsRequest  $request
     * @return Response
     */
    public function update(UpdateNewsRequest $request) {
        $validator = $request->validated();

        $news = News::findOrFail($request->id);

        $this->authorize('update', $news);

        $news->title = $request->title;
        $news->content = $request->content;

        $news->save();

        return response()->json([
            'success' => 'The news has been updated succesfully',
        ]);
    }
    
    /**
     * Delete an existing news.
     *
     * @param  Request  $request
     * @return Response
     */
    public function delete(Request $request) {
        $news = News::findOrFail($request->route()->parameter('id'));
        $this->authorize('delete', $news);
        News::destroy($news->id);

        return response()->json([
            'success' => 'The news has been deleted succesfully',
        ]);
    }

    /**
     * Get the  news of the requested page
     * 
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $amount = config('pagination.news-paginate');
        $news = News::with('author', 'structure')->paginate($amount);

        foreach($news as $post) {
            $post->canEdit = Auth::user()->can('update', $post);
            $post->canDelete = Auth::user()->can('delete', $post);
        }

        return response()->json($news, 200);
    }
}
