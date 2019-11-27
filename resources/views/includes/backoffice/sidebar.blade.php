<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('backoffice.home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('img/favicon.png') }}" alt="logo" />
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('backoffice.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="ucfirst">{{ trans('ui.dashboard_words.overview') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="ucfirst sidebar-heading">
        {{ trans('backoffice.sidebar.admin') }}
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStructures" aria-expanded="true"
           aria-controls="collapseStructures">
            <i class="fas fa-building"></i>
            <span class="ucfirst">{{ trans('backoffice.sidebar.structure') }}</span>
        </a>
        <div id="collapseStructures" class="collapse" aria-labelledby="headingStructures" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header ucfirst">{{ trans('backoffice.sidebar.actions') }}</h6>
                <a class="collapse-item ucfirst" href="{{ route('backoffice.claim-demands.index') }}">{{ trans('backoffice.sidebar.claim-demands') }}</a>
                <a class="collapse-item ucfirst" href="{{ route('backoffice.structure-validation.index') }}">{{ trans('backoffice.sidebar.validation') }}</a>
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
