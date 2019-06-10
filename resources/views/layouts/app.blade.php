<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
@include('includes.head')
</head>

<body>
    @include('includes.app.navbar')

    @if(session()->has('success'))
    <div class="container mt-3">
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    </div>
    @endif
    @if(session()->has('error'))
    <div class="container mt-3">
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    </div>
    @endif
    @if(isset($errors) && !empty($errors->first()))
    <div class="container mt-3">
        <div class="alert alert-danger">
            <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    </div>
    @endif
    
    @yield('content')

    @include('includes.footer')
</body>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

</html>