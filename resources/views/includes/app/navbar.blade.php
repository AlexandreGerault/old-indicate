<nav class="navbar navbar-expand-md navbar-dark bg-primary navbar-inverse">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('app.home') }}"><img src="{{ asset('img/favicon.png') }}" alt="Indicate icon"></a>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto" id="collapsibleNavbar">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('research.form') }}">
                        {{ ucfirst(trans('structure.info.hub')) }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('structure.create') }}">
                        {{ ucfirst(trans('structure.create')) }}
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="fas fa-user-plus"></i>
                        {{ ucfirst(trans('ui.auth.sign_up')) }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt"></i>
                        {{ ucfirst(trans('ui.auth.login')) }}
                    </a>
                </li>
                @endguest
                <!-- Dropdown -->
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('user.show', ['user' => auth()->user()]) }}">
                            {{ ucfirst(trans('user.profile.profileshort')) }}
                        </a>
                        @if(Auth::user()->hasStructure())
                        <a class="dropdown-item"
                           href="{{ route('structure.show', [
                           'structure' => Auth::user()->userStructure->structure]) }}">
                            {{ ucfirst(trans('structure.structure')) }}
                        </a>
                        @endif
                        @can('access-dashboard', Auth::user()->userStructure->structure)
                        <a class="dropdown-item"
                           href="{{ route('structure.dashboard.index', [
                           'structure' => auth()->user()->userStructure->structure]) }}">
                            {{ ucfirst(trans('ui.dashboard')) }}
                        </a>
                        @endcan
                        <a class="dropdown-item"
                           href="{{ url('/logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ ucfirst(trans('ui.auth.logout')) }}
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
                @endauth
            </ul>
        </div>

    </div>
</nav>
