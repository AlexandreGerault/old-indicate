<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('struct')->only('index');
    }
    
    public function index() {
        if (Auth::guest()) {
            return view('app.home');
        }
        return view('app.timeline');
    }
}
