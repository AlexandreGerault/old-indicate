<div class="bg-light">
    <div class="container">
        <div class="row my-3">
            <ul class="nav navbar">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('structure.show', [ 'structure' => $structure ]) }}">
                        {{ ucfirst(trans('structure.characteristics')) }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rating.index', ['structure' => $structure]) }}">
                        {{ ucfirst(trans('structure.rating_tab')) }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
