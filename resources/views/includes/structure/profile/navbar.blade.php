<div class="bg-light">
    <div class="container">
        <div class="row my-3">
            <ul class="nav navbar">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('structure.show', [ 'structure' => $structure ]) }}">
                        @lang('ui.structure.characteristics')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rating.index', ['structure' => $structure]) }}">
                        @lang('ui.structure.rating_tab')
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
