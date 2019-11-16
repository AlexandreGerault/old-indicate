<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\App\Structure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StructureValidationController extends Controller
{
    public function index()
    {
        return view('backoffice.structure_verification.index')
            ->with(
                'structures',
                Structure::unverified()
                ->paginate(config('pagination.backoffice.structure_verification'))
            );
    }

    public function show(Structure $structure)
    {
        return view('backoffice.structure_verification.show')->with('structure', $structure);
    }

    public function validates(Structure $structure)
    {

    }
}
