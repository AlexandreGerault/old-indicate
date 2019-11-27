<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('structure.dashboard.index', Auth::user()->userStructure->structure) }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/favicon.png') }}" alt="logo" />
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('structure.dashboard.index', Auth::user()->userStructure->structure) }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="ucfirst">{{ trans('ui.dashboard_words.overview') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="ucfirst sidebar-heading">
        {{ trans('ui.dashboard_words.admin') }}
    </div>

    <!-- Nav Item - Structures Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStructures" aria-expanded="true"
           aria-controls="collapseStructures">
            <i class="fas fa-building"></i>
            <span class="ucfirst">{{ trans('structure.structure') }}</span>
        </a>
        <div id="collapseStructures" class="collapse" aria-labelledby="headingStructures" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{ trans('structure.dashboard.manage') }}</h6>
                <a class="collapse-item" href="{{ route('structure.dashboard.profile', Auth::user()->userStructure->structure) }}">{{ trans('structure.dashboard.profile') }}</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Members Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMembers" aria-expanded="true"
           aria-controls="collapseMembers">
            <i class="fas fa-user"></i>
            <span>{{ trans('structure.members') }}</span>
        </a>
        <div id="collapseMembers" class="collapse" aria-labelledby="headingMembers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">{{ trans('structure.dashboard.manage') }}</h6>
                <a class="collapse-item" href="{{ route('structure.dashboard.members.list', Auth::user()->userStructure->structure) }}">
                    {{ trans('structure.dashboard.members.list') }}
                </a>
                <a class="collapse-item" href="{{ route('structure.dashboard.members.demands', Auth::user()->userStructure->structure) }}">
                    {{ trans('structure.dashboard.members.demands') }}
                </a>
                <a class="collapse-item" href="{{ route('structure.dashboard.members.authorizations.list', Auth::user()->userStructure->structure) }}">
                    {{ trans('structure.dashboard.members.permissions') }}
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
