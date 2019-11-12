<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPost;
use Auth;
use Validator;
use Date;

class BlogController extends Controller
{
    /**
     * Display a list of recent posts
     *
     * @param  Request  $request
     * @return Response
     */
    public function index()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(5);

        return view('blog.index')->with('posts', $posts)->with('title', 'Derniers articles publiés');
    }

    /**
     * Display a list of search results
     *
     * @param  Request  $request
     * @return Response
     */
    public function search(Request $request)
    {
        $title = $request->input('title');

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect(route('blog.index', 'blog'))
                ->withErrors($validator)
                ->withInput();
        }

        $posts = BlogPost::where('title', 'LIKE', '%'.$title.'%')
            ->orderBy('title')
            ->paginate(5);

        return view('blog.index')
            ->with('posts', $posts)
            ->with('title', 'Résultat de la recherche pour <strong>'.$title.'</strong>');
    }

    /**
     * Display a blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function show(Request $request)
    {
        $post = BlogPost::findOrFail($request->route()->parameter('id'));

        return view('blog.show')->with('post', $post);
    }

    /**
     * Display a form to write a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {

        return view('blog.create');
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('blog.create', 'blog'))
                ->withErrors($validator)
                ->withInput();
        }

        $post = new BlogPost;

        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->author_id = $request->user()->id;

        $post->save();

        return redirect()->route('blog.index', 'blog');
    }

    /**
     * Show a table with actions to manage posts.
     *
     * @return Response
     */
    public function dashboard()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(5);

        return view('blog.dashboard')->with('posts', $posts);
    }

    /**
     * Display a form to edit an existing blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function edit(Request $request)
    {
        $post = BlogPost::findOrFail($request->route()->parameter('id'));

        return view('blog.edit')->with('post', $post);
    }

    /**
     * Update an existing blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $post = BlogPost::findOrFail($request->route()->parameter('id'));

        $post->title = $request->get('title');
        $post->content = $request->get('content');

        $post->save();

        return redirect()->route('blog.read', [
            'blog' => 'blog',
            'id' => $post->id,
            'slug' => str_slug($post->title)]);
    }

    /**
     * Delete an existing blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function delete(Request $request)
    {
        $post = BlogPost::findOrFail($request->route()->parameter('id'));

        $post->delete();

        return redirect()->route('blog.dashboard', ['blog' => 'blog']);
    }
}
