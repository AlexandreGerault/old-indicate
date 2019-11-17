<div class="py-5">
    <div class="container">
        @if (session('flash'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('flash') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row shadow-none border-light">
            <div class="col-12 col-sm-4 col-md-2 text-center text-sm-left">
                <div class="row">
                    <p class="text-center col-6 col-sm-12 mx-auto">
                        <img class="img-fluid d-block"
                             src="/storage/users/avatars/{{ $user->avatar }}"
                             alt="user's avatar" />
                    </p>
                </div>
                @if(auth()->id() === $user->id && Route::currentRouteName() !== 'user.edit')
                    <p class="small">
                        <a href="{{ route('user.edit', ['user' => auth()->user()]) }}">
                            {{ ucfirst(trans('user.profile.edit')) }}
                        </a>
                    </p>
                @endif
            </div>
            <div class="col-12 col-sm-8 col-md-10 shadow-none text-center text-sm-left">
                <h1>{{ $user->firstname }} {{ $user->lastname }}</h1>

                @if ($user->hasStructure())

                    @switch($user->userStructure->status)

                        @case(config('enums.structure_membership_request_status.PENDING'))
                        <p class="lead">
                            {{ __('Demande d\'affiliation en cours...') }}
                        </p>
                        @break

                        @case(config('enums.structure_membership_request_status.ACCEPTED'))
                        <p class="lead">
                            <a href="{{ route('structure.show', ['structure' => $user->userStructure->structure]) }}">
                                {{ $user->userStructure->structure->name }}
                            </a>
                        </p>
                        @break

                        @default
                        @if (Auth::user()->id === $user->id)
                            <p class="lead">{{ __('Votre requête rencontre un problème. Veuillez contacter le support') }}</p>
                        @endif

                    @endswitch

                @endif

            </div>
        </div>
    </div>
</div>
