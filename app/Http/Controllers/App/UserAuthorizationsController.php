<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAuthorizationsRequest;
use App\Models\App\UserAuthorizations;

class UserAuthorizationsController extends Controller
{
    public function update (UpdateAuthorizationsRequest $request) {
        $validator = $request->validated();

        $authorizations = UserAuthorizations::findOrFail($request->id);
        $inputs = $request->except(['_token']);

        foreach ($inputs as $key => $value) {
            $authorizations->$key = $request->has($key);
        }

        $authorizations->save();

        return back()->with('success', 'Permissions updated successfully');
    }
}
