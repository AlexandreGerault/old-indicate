<div class="py-5">
    <div class="container">
        <div class="row shadow-none border-light">
            <div class="col-4 col-md-2">
                <img
                    class="img-fluid d-block"
                    src="/storage/structures/avatars/{{ $structure->avatar }}"
                    alt="structure's logo">
            </div>
            <div class="col-8 col-md-10 shadow-none">
                <h1>
                    {{ $structure->name }}
                    <small>
                        <span class="badge badge-secondary h4">
                            {{ ucfirst(trans('structure.type.' . $structure->data_type)) }}
                        </span>
                    </small>
                </h1>
                <p class="lead">{{ $structure->comment }}</p>
                @can('follow', $structure)
                    @follow(['structure_id' => $structure->id]) @endfollow
                @endcan
                @if (auth()->user()->hasStructure()
                && auth()->user()->userStructure->structure->follows($structure)
                && auth()->user()->userStructure->structure->id !== $structure->id)
                    @unfollow(['structure_id' => $structure->id]) @endunfollow
                @endif
                @can('join', $structure)
                    <a href="{{ route('structure.join', [ 'structure' => $structure ]) }}" class="btn btn-primary">
                        {{ ucfirst(trans('structure.join')) }}
                    </a>
                @endcan
                @can('claim', $structure)
                    <a href="{{ route('structure.claim', [ 'structure' => $structure ]) }}" class="btn btn-primary">
                        {{ ucfirst(trans('structure.claim')) }}
                    </a>
                @endcan
            </div>
        </div>
    </div>
</div>
