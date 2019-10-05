<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
@include('includes.head')
</head>

<body>
    @include('includes.app.navbar')

    @include('includes.alerts')

    @yield('content')

    @include('includes.footer')
</body>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

</html>
