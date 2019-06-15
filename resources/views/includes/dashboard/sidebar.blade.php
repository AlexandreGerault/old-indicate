<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('structure.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>@lang('Overview')</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="membersDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i>
            <span>@lang('Members')</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="membersDropdown">
            <a class="dropdown-item" href="{{ route('structure.dashboard.members.list') }}">@lang('List')</a>
            <a class="dropdown-item" href="{{ route('structure.dashboard.members.demands') }}">@lang('Demands')</a>
            <a class="dropdown-item" href="{{ route('structure.dashboard.members.authorizations.list') }}">@lang('Permissions')</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('structure.dashboard.news') }}">
            <i class="fas fa-newspaper"></i>
            <span>@lang('News')</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('structure.dashboard.caracteristics') }}">
            <i class="fas fa-address-card"></i>
            <span>@lang('Caracteristics')</span>
        </a>
    </li>
</ul>
