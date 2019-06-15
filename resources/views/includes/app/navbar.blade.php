<nav class="navbar navbar-expand-md navbar-dark bg-primary navbar-inverse">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('app.home') }}">Indicate</a>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto" id="collapsibleNavbar">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.home') }}">@lang('Home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('research') }}">@lang('Research')</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <form class="form-inline" action="{{ route('search') }}" method="GET">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Chercher une structure" name="search" id="search-input">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit">Chercher</button>
                            </div>
                        </div>
                    </form>
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
                        <a class="dropdown-item" href="{{ route('user.profile.show', ['id' => Auth::id()]) }}">Profile</a>
                        @if(Auth::user()->hasStructure())
                        <a class="dropdown-item" href="{{ route('structure.profile.show', ['id' => Auth::user()->structure->id]) }}">Structure</a>
                        @endif
                        @can('access-dashboard', App\Models\App\Structure::class)
                        <a class="dropdown-item" href="{{ route('structure.dashboard.index') }}">Dashboard</a>
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