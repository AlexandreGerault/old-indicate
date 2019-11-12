<?php

namespace App\Http\Controllers\App;

use App\Models\App\Structure;
use Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Schema;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\App\UserStructure;

class DashboardController extends Controller
{
    /**
     * Dashboard overview
     *
     * @param Structure $structure
     * @return Factory|View
     */
    public function index(Structure $structure)
    {
        $members = count($structure->members);
        $news = count($structure->news);
        $followers = count($structure->followers);
        $following = count($structure->following);

        return view('structure.dashboard.home', compact('members', 'news', 'followers', 'following'));
    }

    /**
     * Display a table of structure members
     *
     * @param Structure $structure
     * @return Factory|View
     */
    public function listMembers(Structure $structure)
    {
        $members = $structure->members()->paginate(25);

        return view('structure.dashboard.members.list', compact('members'));
    }

    /**
     * Display a table of incoming joining demands
     *
     * @return Factory|View
     */
    public function demands()
    {
        $demands = UserStructure::byStructure(Auth::user()->userStructure->structure)->pending()->get();
        return view('structure.dashboard.members.demands', compact('demands'));
    }

    /**
     * Display a table of member's permissions
     *
     * @return Factory|View
     */
    public function permissionsMembers()
    {
        $structure = auth()->user()->userStructure->structure;
        $columns = array_diff(
            Schema::getColumnListing('users_authorizations'),
            ['id', 'user_id', 'created_at', 'updated_at']
        );
        $members = $structure->members;

        return view('structure.dashboard.members.permissions', compact('columns', 'members'));
    }

    /**
     * Edit member's information (related to the structure)
     *
     * @param int $id
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function editMember($id)
    {
        $this->authorize('manage-users', Structure::class);

        $user = User::findOrFail($id);

        return view('structure.dashboard.members.edit', compact('user'));
    }

    /**
     * Display information about the structure's news (update DOC later)
     *
     * @return Factory|View
     */
    public function news()
    {
        return view('structure.dashboard.news');
    }

    /**
     * Display a form to update structure's profile
     *
     * @return Factory|View
     */
    public function profile()
    {
        $structure = auth()->user()->userStructure->structure;
        $type = $structure->data_type;

        return view('structure.dashboard.profile', compact('type', 'structure'));
    }
}
