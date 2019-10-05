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
    public function __construct() {
        $this->middleware('struct')->only('index');
    }

    /**
     * @return Factory|View
     */
    public function index() {
        if (Auth::guest()) {
            return view('app.home');
        }
        return view('app.timeline');
    }
}
