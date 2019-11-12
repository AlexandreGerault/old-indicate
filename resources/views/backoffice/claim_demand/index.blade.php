<table>
    <tr>
        <th>@lang('ui.user')</th>
        <th>@lang('ui.structure.name')</th>
        <th>actions</th>
    </tr>
    @foreach($claimdemands as $demand)
    <tr>
        <td><a href="{{ route('user.show', ['user' => $demand->user]) }}">{{ $demand->user->firstname . ' ' . $demand->user->lastname }}</a></td>
        <td><a href="{{ route('structure.show', ['structure' => $demand->$structure]) }}">{{ $demand->structure->name }}</a></td>
        <td>
            <a class="btn btn-primary" href="{{ route('claimdemand.validates', ['claimdemand' => $demand]) }}">Accepter</a>
            <a class="btn btn-primary" href="{{ route('claimdemand.rejects', ['claimdemand' => $demand]) }}">Refuser</a></td>
    </tr>
    @endforeach
</table>
