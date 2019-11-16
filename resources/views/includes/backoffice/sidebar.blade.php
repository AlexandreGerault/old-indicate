<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>
                {{ ucfirst(trans('ui.dashboard_words.overview')) }}
            </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('claimdemand.index') }}">
            <i class="fas fa-th-list"></i>
            <span>
                {{ ucfirst(trans('structure.claimdemands.indexshort')) }}
            </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('structure-validation.index') }}">
            <i class="fas fa-building"></i>
            <span>
                {{ ucfirst(trans('structure.validation.indexshort')) }}
            </span>
        </a>
    </li>
</ul>
