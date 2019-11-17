<form method="post" action="{{ route('user.update', ['user' => $user]) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="firstname">
            {{ ucfirst(trans('user.firstname')) }}
        </label>
        <input type="text"
               name="firstname"
               id="firstname"
               class="form-control"
               placeholder="{{ ucfirst(trans('user.firstname')) }}"
               value="{{ $user->firstname }}"
        />
    </div>
    <div class="form-group">
        <label for="lastname">
            {{ ucfirst(trans('user.lastname')) }}
        </label>
        <input type="text"
               name="lastname"
               id="lastname"
               class="form-control"
               placeholder="{{ ucfirst(trans('user.lastname')) }}"
               value="{{ $user->lastname }}"
        />
    </div>
    <div class="form-group">
        <label for="email">{{ ucfirst(trans('user.email')) }}</label>
        <input type="text"
               name="email"
               id="email"
               class="form-control"
               placeholder="{{ ucfirst(trans('user.email')) }}"
               value="{{ $user->email }}"
        />
    </div>
    <div class="form-group">
        <div class="custom-file d-block">
            <input type="file"
                   class="form-control-file"
                   name="avatar"
                   id="avatar"
                   aria-describedby="fileHelp"
                   lang="{{ env('APP') }}"
            />
            <label class="custom-file-label" for="avatar">
                {{ ucfirst(trans('user.avatar.choose')) }}
            </label>
        </div>
    </div>
    <div class="form-group">
        <input type="submit"
               class="btn btn-outline-primary"
               value="{{ ucfirst(trans('user.profile.update')) }}"
        />
    </div>

</form>
