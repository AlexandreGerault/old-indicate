<?php

namespace App\Http\Controllers\App;

use Schema;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\App\Structure;
use App\Models\App\UserStructure;

class DashboardController extends Controller
{
    public function index () {
        $structure = auth()->user()->structure;

        $members = count($structure->members);
        $news = count($structure->news);
        $followers = count($structure->followers);
        $following = count($structure->following);

        return view('structure.dashboard.home', compact('members', 'news', 'followers', 'following'));
    }

    public function listMembers () {
        $structure = auth()->user()->structure;
        $members = $structure->members()->paginate(25);

        return view('structure.dashboard.members.list', compact('members'));
    }

    public function demands () {
        $demands = UserStructure::byStructure(auth()->user()->structure)->pending()->get();
        return view('structure.dashboard.members.demands', compact('demands'));
    }

    public function permissionsMembers () {
        $structure = auth()->user()->structure;
        $columns = \array_diff(Schema::getColumnListing('users_authorizations'), ['id', 'user_id', 'created_at', 'updated_at']);
        $members = $structure->members;

        return view('structure.dashboard.members.permissions', compact('columns', 'members'));
    }

    public function editMember ($id) {
        // $this->authorize('manage-users', Structure::class);

        $user = User::findOrFail($id);

        return view('structure.dashboard.members.edit', compact('user'));
    }

    public function news () {
        return view('structure.dashboard.news');
    }

    public function caracteristics () {
        $type = auth()->user()->structure->typename();
        $columns = \array_diff(Schema::getColumnListing($type . '_data'), ['id', 'structure_id', 'created_at', 'updated_at']);

        return view('structure.dashboard.caracteristics', compact('type'));
    }
}
