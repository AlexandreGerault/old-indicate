<div class="py-5">
    <div class="container">
        <div class="row shadow-none border-light">
            <div class="col-12 col-sm-4 col-md-2 text-center text-sm-left">
                <div class="row">
                    <p class="text-center col-6 col-sm-12 mx-auto">
                        <img
                            class="img-fluid d-block"
                            src="/storage/structures/avatars/{{ $structure->avatar }}"
                            alt="structure's logo"
                        />
                    </p>
                </div>
            </div>

            <div class="col-12 col-sm-8 col-md-10 shadow-none text-center text-sm-left">
                <h1>
                    {!! $structure->verified ? '<i class="fas fa-check-circle text-primary"></i>' : '' !!}
                    {{ $structure->name }}
                </h1>
                <p class="lead">
                    <span class="badge badge-secondary h4">
                        {{ ucfirst(trans('structure.type.' . $structure->data_type)) }}
                    </span>
                </p>
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
                @if ($structure->ratings->count() > 0)
                    {{ ucfirst(trans('rating.mean')) }} : {{ $structure->averageRating() }}/5
                @endif
            </div>
        </div>
    </div>
</div>
