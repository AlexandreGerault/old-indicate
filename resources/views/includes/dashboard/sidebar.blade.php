<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('structure.dashboard.index', auth()->user()->userStructure->structure) }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>@lang('ui.dashboard_words.overview')</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="membersDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i>
            <span>@lang('ui.dashboard_words.members')</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="membersDropdown">
            <a class="dropdown-item" href="{{ route('structure.dashboard.members.list', auth()->user()->userStructure->structure) }}">@lang('ui.dashboard_words.list')</a>
            <a class="dropdown-item" href="{{ route('structure.dashboard.members.demands', auth()->user()->userStructure->structure) }}">@lang('ui.dashboard_words.demands')</a>
            <a class="dropdown-item" href="{{ route('structure.dashboard.members.authorizations.list', auth()->user()->userStructure->structure) }}">@lang('ui.dashboard_words.permissions')</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('structure.dashboard.news', auth()->user()->userStructure->structure) }}">
            <i class="fas fa-newspaper"></i>
            <span>@lang('ui.dashboard_words.news')</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('structure.dashboard.profile', auth()->user()->userStructure->structure) }}">
            <i class="fas fa-address-card"></i>
            <span>@lang('ui.dashboard_words.profile')</span>
        </a>
    </li>
</ul>
