<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="{{ asset('css/sb-admin.css') }}">
    @include('includes.head')
</head>

<body>
@include('includes.backoffice.navbar')

<div id="wrapper">
    @include('includes.backoffice.sidebar')

    <div id="content-wrapper" class="bg-light">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
        @yield('breadcrumb')

        @include('includes.alerts')

        <!-- Page Content -->
            @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Indicate 2019</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/sb-admin.min.js') }}"></script>
</body>

</html>
