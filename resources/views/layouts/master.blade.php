<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('page-title', 'Espace Admin') | {{ isset($_setting) ? $_setting->name : 'App Name' }}
        </title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href=" {{ asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('/assets/core-admin/styles/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        @yield('header-scripts')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed" style="height: auto;padding-top: 70px;">
        <div class="wrapper">
            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="" alt="{{ isset($_setting) ? $_setting->name : 'App Name' }}" height="60" width="60">
            </div>

            <!-- Navbar -->
            @include('layouts.partials.topnav')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('layouts.partials.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">@yield('page-header-title')</h1>
                            </div>
                            <div class="col-sm-6">
                                {{ Breadcrumbs::render() }}
                            </div>
                        </div>
                    </div>
                </div>

                @include('layouts.partials.message')

                <div class="content">
                    {{$slot}}
                </div>
            <!-- /.content -->
            </div>

            @yield('floating-buttons')

            <!-- /.content-wrapper -->
            @include('layouts.partials.footer')

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
        <script src="{{ asset('assets/core-admin/scripts/app.js')}}"></script>
        @yield('footer-scripts')
    </body>
</html>
