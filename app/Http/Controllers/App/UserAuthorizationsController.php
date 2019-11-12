<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAuthorizationsRequest;
use App\Models\App\UserAuthorizations;

class UserAuthorizationsController extends Controller
{
    /**
     * Update member's authorization
     *
     * @param UpdateAuthorizationsRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateAuthorizationsRequest $request)
    {
        $request->validated();

        $authorizations = UserAuthorizations::findOrFail($request->input('id'));
        $inputs = $request->except(['_token']);

        foreach ($inputs as $key => $value) {
            $authorizations->$key = $request->has($key);
        }

        $authorizations->save();

        return back()->with('success', __('success.permission.updated'));
    }
}
