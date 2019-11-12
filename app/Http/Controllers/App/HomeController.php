<?php

namespace App\Http\Controllers\App;

use Illuminate\Contracts\View\Factory;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        if (Auth::guest()) {
            return view('app.home');
        } elseif (!Auth::user()->hasStructure()) {
            return view('user.profile.show', ['user' => Auth::user()]);
        } elseif (Auth::user()->hasStructure()) {
            return view('app.timeline');
        }
    }
}
