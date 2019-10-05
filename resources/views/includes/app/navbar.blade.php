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
                    <a class="nav-link" href="{{ route('app.home') }}">@lang('Indicate')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('research.form') }}">@lang('Research')</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> @lang('Sign up')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> @lang('Login')</a></li>
                @endguest
                <!-- Dropdown -->
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('user.show', ['user' => auth()->user()]) }}">Profile</a>
                        @if(Auth::user()->hasStructure())
                        <a class="dropdown-item" href="{{ route('structure.show', ['structure' => auth()->user()->userStructure->structure->id]) }}">Structure</a>
                        @endif
                        @can('access-dashboard', App\Models\App\Structure::class)
                        <a class="dropdown-item" href="{{ route('structure.dashboard.index', ['structure' => auth()->user()->userStructure->structure->id ]) }}">Dashboard</a>
                        @endcan
                        <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            @lang('Logout')
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
