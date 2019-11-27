<?php

namespace App\Http\Controllers\App;

use App\Http\Requests\UpdateContactMeansRequest;
use App\Http\Requests\UpdateStructureRequest;
use App\Models\App\Address;
use App\Models\App\ContactMeans;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\App\Structure;
use App\Http\Requests\StoreStructureRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StructureController extends Controller
{

    /**
     * Return a json list of structures
     *
     * @return JsonResponse
     */
    public function index()
    {
        $structures = Structure::paginate(15);
        return response()->json($structures, 200);
    }

    /**
     * Display a structure profile
     *
     * @param Structure $structure
     * @return Factory|View
     */
    public function show(Structure $structure)
    {
        return view('app.structure.show')->with('structure', $structure)->with('news', $structure->news);
    }

    /**
     * Show a form to create a structure.
     *
     * @return View
     */
    public function create()
    {
        return view('app.structure.create');
    }

    /**
     * Store a new structure
     *
     * @param StoreStructureRequest $request
     * @return RedirectResponse
     */
    public function store(StoreStructureRequest $request)
    {
        //dd($request);
        //Store the structure's address
        $address = new Address($request->only('postcode', 'house_number', 'county', 'country', 'road', 'city'));
        $address->save();

        //Store the structure's contact means
        $contact = new ContactMeans($request->only('email', 'phone_number'));
        $contact->mailingAddress()->associate($address);
        $contact->save();

        //Store the structure
        $structure = new Structure($request->only('name', 'comment', 'siren', 'siret'));
        $structure->data_type = $request->input('data_type');
        $structure->address()->associate($address);
        $structure->contact()->associate($contact);
        $structure->save();

        if ($request->hasFile('avatar')) {
            $structure->updateAvatar($request->file('avatar'));
        }

        return redirect()->route('app.home');
    }

    /**
     * Update the structure's profile
     *
     * @param UpdateStructureRequest $request
     * @param Structure $structure
     * @return RedirectResponse
     */
    public function update(UpdateStructureRequest $request, Structure $structure)
    {
        $structure->update($request->validated());

        return redirect()->back()->with('success', __('success.structure.update'));
    }

    public function updateContactMeans(UpdateContactMeansRequest $request, Structure $structure)
    {
        $structure->contact()->update($request->validated());

        return redirect()->back()->with('success', __('success.structure.contact.update'));
    }

    /**
     * Return a Json response of news
     *
     * @param \Request $request
     * @param Structure $structure
     * @return JsonResponse
     */
    public function news(Request $request, Structure $structure)
    {
        $amount = config('pagination.news-paginate');

        $news = $structure->news()->with('author', 'structure')->orderBy('created_at', 'desc')->paginate($amount);

        foreach ($news as $post) {
            $post->canEdit = auth()->user()->can('update', $post);
            $post->canDelete = auth()->user()->can('delete', $post);
        }

        if($request->ajax())
            return response()->json($news, 200);
        else
            return view('app.structure.news')->with('structure', $structure);
    }

    /**
     * Return a Json response of news feed
     *
     * @param Structure $structure
     * @return JsonResponse
     */
    public function timeline(Structure $structure)
    {
        $amount = config('pagination.news-paginate');

        $news = $structure->timeline()->with('author', 'structure')->orderBy('created_at', 'desc')->paginate($amount);

        foreach ($news as $post) {
            $post->canEdit = auth()->user()->can('update', $post);
            $post->canDelete = auth()->user()->can('delete', $post);
        }

        return response()->json($news, 200);
    }
}
