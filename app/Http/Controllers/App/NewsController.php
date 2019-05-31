<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewsRequest;

use App\Models\App\News;

use Auth;

class NewsController extends Controller
{
    /**
     * Store a news.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(StoreNewsRequest $request) {
        $validator = $request->validated();
        
        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => Auth::id(),
            'structure_id' => Auth::user()->structure->id,
        ]);

        return back();
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

}
