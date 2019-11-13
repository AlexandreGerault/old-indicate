<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;

use App\Models\App\News;
use App\Models\App\Structure;

use Auth;

class NewsController extends Controller
{
    /**
     * Store a news
     *
     * @param StoreNewsRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(StoreNewsRequest $request)
    {
        $request->validated();
        $structure = $request->route('structure');

        $this->authorize('create', [News::class, $structure]);

        $news = new News();
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->author()->associate(auth()->user());
        $news->structure()->associate($structure);
        $news->save();

        return back();
    }

    /**
     * Update a News
     *
     * @param UpdateNewsRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        $request->validated();

        $news = News::findOrFail($id);

        $news->title = $request->input('title');
        $news->content = $request->input('content');

        $news->save();

        return response()->json([
            'success' => 'The news has been updated successfully',
        ]);
    }

    /**
     * Delete an existing news
     *
     * @param News $news
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $this->authorize('delete', $news);
        News::destroy($id);

        return response()->json([
            'success' => 'The news has been deleted successfully',
        ]);
    }

    /**
     * Get the  news of the requested page
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $amount = config('pagination.news-paginate');
        $news = News::with('author', 'structure')->paginate($amount);

        foreach ($news as $post) {
            $post->canEdit = Auth::user()->can('update', $post);
            $post->canDelete = Auth::user()->can('delete', $post);
        }

        return response()->json($news, 200);
    }
}
