<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('page-title', 'Notre belle agence immobilière') | {{ isset($_setting) ? $_setting->name : 'App Name' }}
        </title>

        @section('header-styles')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link rel="stylesheet" href="{{ asset('assets/core-site/styles/app.css') }}">
        @show
    </head>
    <body>
        <div class="header {{ $agent->isMobile() ? 'header--mobile' : 'header--desktop' }}">
            @include('layouts.partials._header._navigation')
        </div>

        @if( 'home' != Route::currentRouteName() )
            <div class="container">
                <div class="row">
                    <div class="col text-left">
                        {{ Breadcrumbs::render() }}
                    </div>
                </div>
            </div>
        @endif

        <section class="content section">
            <div class="container section__container">
                {{ $slot }}

                <div class="footer mt-5 mb-5 mb-sm-0">
                    @include('layouts.partials._footer._footer')
                </div>
            </div>
        </section>

        @section('footer-scripts')
            <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
            <script src="{{ asset('assets/core-site/scripts/app.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $("#sidebar").mCustomScrollbar({
                        theme: "minimal"
                    });

                    $('#dismiss, .overlay').on('click', function () {
                        $('#sidebar').removeClass('active');
                        $('.overlay').removeClass('active');
                    });

                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').addClass('active');
                        $('.overlay').addClass('active');
                        $('.collapse.in').toggleClass('in');
                        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                    });
                });
            </script>
        @show
    </body>
</html>
